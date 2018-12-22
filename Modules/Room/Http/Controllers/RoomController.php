<?php

namespace Modules\Room\Http\Controllers;

use App\Models\Attachments;
use App\Models\Category;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $data['rooms'] = Room::all();
        // dd($data['rooms']->toArray());exit();       
        return view('room::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */ 

     public function district(Request $request){
        $province_id = $request->get('province_id');
        $district=District::where('province_id','=',$province_id)->get();
        return response()->json($district);
     }
     public function village(Request $request){
        $district_id = $request->get('district_id');
        $village=Village::where('district_id','=',$district_id)->get();
        return response()->json($village);
     }

    public function create(Request $request)
    {
        // $data['district'] = District::all()->toJson();
        $data['province'] = Province::all()->toJson();
        // $data['village'] = Village::all()->toJson();
        $data['cates'] = Category::all();
        return view('room::create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd($request->all());exit();
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'room_area' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'original_price' => 'required',
            'cate' => 'required',
            'avatar' => 'required|image|max:2048',
            'images.*' => 'image|max:2048',
        ], [
            'name.required' => 'Vui lòng nhập tiêu đề !',
            'description.required' => 'Vui lòng nhập mô tả !',
            'room_area.required' => 'Vui lòng nhập diện tích',
            'address.required' => 'Vui lòng nhập địa chỉ !',
            'phone.required' => 'Vui lòng nhập số điện thoại !',
            'original_price.required' => 'Vui lòng nhập giá phòng !',
            'cate.required' => 'Vui lòng lựa chọn danh mục !',
            'avatar.max' => 'Kích thước vượt qua :max KB!',
            'avatar.image' => 'Sai định dạng ảnh!',
            'avatar.required' => 'Vui lòng nhập ảnh đại diện !',
            'images.*.max' => 'Kích thước vượt qua :max KB !',
        ]);
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $room = new Room();
            $room->name = $request->name;
            $room->slug = str_slug($request->name);
            $room->description = $request->description;
            $room->area_room = $request->room_area;
            $room->address = $request->address;
            $room->phone = $request->phone;
            $room->original_price = $request->original_price;
            $room->active = 0;
            $room->category_id = $request->cate;
            $room->province_id = $request->province;
            $room->district_id = $request->district;
            $room->village_id = $request->village;
            $room->admin_id = Auth::user()->id;
            if ($request->has('sale_price')) {
                $room->sale_price = $request->sale_price;
            }
            if ($request->hasFile('avatar') && $request->avatar) {
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $images = time() . '.' . $extension;
                $file->move('uploads/images/', $images);
                $room->images = $images;
            }
            $room->save();
            if ($request->hasFile('images') && $request->images) {
                foreach ($request->file('images') as $item) {
                    if (!empty($item)) {
                        $fileName = $item->getClientOriginalName();
                        $imagesthumb = $fileName;
                        $item->move('uploads/images/', $imagesthumb);
                    }
                    Attachments::create([
                        'room_id' => $room->id,
                        'images' => $imagesthumb
                    ]);
                }
            }
            return redirect()->route('room.index')->with('mess','Thêm thành công !');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('room::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data['attr'] = Attachments::where('room_id',$id)->get();
        $data['provinces'] = Province::all()->toJson();
//        dd($data['provinces']);exit();
        $data['districts'] = District::all();
        $data['villages'] = Village::all();
//        dd( $data['attr']->toArray());exit();
        $data['room']=Room::findOrFail($id);

        $data['cates']= Category::all();
//        dd($data['room']->toArray());exit();
        return view('room::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
//        dd($request->images);exit();
        $room = Room::findOrFail($id);
        $attachments = Attachments::where('room_id',$id)->get();
//        dd($attachments);exit();
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'room_area' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'original_price' => 'required',
            'cate' => 'required',
            'avatar' => 'image|max:2048',
            'images.*' => 'image|max:2048',
        ], [
            'name.required' => 'Vui lòng nhập tiêu đề !',
            'description.required' => 'Vui lòng nhập mô tả !',
            'room_area.required' => 'Vui lòng nhập diện tích',
            'address.required' => 'Vui lòng nhập địa chỉ !',
            'phone.required' => 'Vui lòng nhập số điện thoại !',
            'original_price.required' => 'Vui lòng nhập giá phòng !',
            'cate.required' => 'Vui lòng lựa chọn danh mục !',
            'avatar.max' => 'Kích thước vượt qua :max KB!',
            'avatar.image' => 'Sai định dạng ảnh!',
            'images.*.max' => 'Kích thước vượt qua :max KB !',
        ]);
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $room->name = $request->name;
            $room->description = $request->description;
            $room->area_room = $request->room_area;
            $room->address = $request->address;
            $room->phone = $request->phone;
            $room->original_price = $request->original_price;
            $room->active = 0;
            $room->category_id = $request->cate;
            $room->province_id = $request->province;
            $room->district_id = $request->district;
            $room->village_id = $request->village;
            $room->admin_id = Auth::user()->id;
            if ($request->has('sale_price')) {
                $room->sale_price = $request->sale_price;
            }
            if ($request->hasFile('avatar') && $request->avatar) {
                /*lấy ra đường dẫn và xóa hình ảnh đại diện */
                $file_path = 'uploads/images/' . $room->images;
                if (file_exists($file_path)) {
                    File::delete($file_path);
                }
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $images = time() . '.' . $extension;
                $file->move('uploads/images/', $images);
                $room->images = $images;
            }
            $room->save();
            if ($request->hasFile('images') && $request->images && $request->file('images')) {
                /*nếu có request của images thì tiến hành xóa những record cũ*/
                Attachments::where('room_id','=',$id)->delete();
                foreach ($attachments as $att) {
                    /*lấy ra đường dẫn và xóa hình ảnh trong folder uploads/images */
                    $file_path = 'uploads/images/' . $att->images;
                    if (file_exists($file_path)) {
                        File::delete($file_path);
                    }
                }
                foreach ($request->file('images') as $item) {
                    if (!empty($item)) {
                        $fileName = $item->getClientOriginalName();
                        $imagesthumb = $fileName;
                        $item->move('uploads/images/', $imagesthumb);

                        Attachments::create([
                            'room_id' => $room->id,
                            'images' => $imagesthumb
                        ]);

                    }
                }
               
            }
            return redirect()->route('room.index')->with('mess','Cập Nhật thành công !');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->back()->with('mess_delete','xóa phòng này thành công !');
    }
    /*hàm kích hoạt*/
    public function approve($id){
        $room= Room::findOrFail($id);
        $room->update(['active'=>1]);
        return redirect()->back()->with('mess','Kích Hoạt Thành Công !');
    }
    /*hàm bỏ kích hoạt*/
    public function unapprove($id){
        $room= Room::findOrFail($id);
        $room->update(['active'=>0]);
        return redirect()->back()->with('mess','Bỏ Kích Hoạt Thành Công !');
    }
}

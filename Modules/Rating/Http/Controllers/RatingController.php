<?php

namespace Modules\Rating\Http\Controllers;

use App\Models\Rating;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['rating']= DB::table('rating')
            ->join('room','rating.room_id','=','room.id')
            ->select('room.name','rating.star','rating.id')->get();

//        dd($data['rating']);exit();
        return view('rating::index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['rooms'] = Room::all();
        return view('rating::create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(),[
                'room'=>'required',
                'star'=>'required'
        ],[
                'room.required'=> 'Bạn chưa chọn phòng !',
                'star.required'=> 'Bạn chưa chọn điểm !'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $rating = new Rating();
            $rating->room_id= $request->room;
            $rating->star=$request->star;
            $rating->save();
            return redirect()->route('rating.index')->with('mess','Thêm đánh giá thành công !');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('rating::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('rating::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}

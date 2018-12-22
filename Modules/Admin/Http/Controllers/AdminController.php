<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function getlogin()
    {
       
        if(!Auth::check()){
            return view('admin::layouts.admin.login');
        }else{
            return redirect('admin');
        }

    }

    public function postlogin(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Vui lòng nhập email đăng nhập!',
            'email.email' => 'Sai định dạng email!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.min' => 'Mật khẩu không được bé hơn 6 ký tự!'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $password = $request->password;
        $email = $request->email;
        if (Auth::attempt(['email' => $email, 'password' => $password,'active'=>1])) {
            return redirect()->route('admin.dashboard');
        }else{
           return redirect()->back()->with('mess','sai thông tin đăng nhập!');
        }
    }
    public function  logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    //end funtion login
    public function index()
    {
        $data['admins'] = Admin::all();

        return view('admin::layouts.admin.index', $data);
    }
    public  function register(){
        return view('admin::layouts.admin.register');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::layouts.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

//        dd($avatar);exit();
//        dd($request->all());exit();
        $valid = Validator::make($request->all(), [
            'username' => 'required|unique:admins',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:admins',
            'images' => 'required|mimes:jpg,png,jpeg'
        ], [
                'username.required' => 'Vui Lòng Nhập UserName!',
                'username.unique' => 'Tên Đăng Nhập Đã Tồn Tại,Vui Lòng Chọn Tên Khác!',
                'password.required' => 'Mật Khẩu Không Được Để Trống!',
                'password.min' => 'mật khẩu phải lớn hơn 6 ký tự !',
                'images.required' => 'Chưa có avatar',
                'images.mimes' => 'Định dạng không cho phép!',
                'email.required' => 'Vui lòng nhập mail',
                'email.email' => 'Sai định dạng email',
                'email.unique' => 'Email đã tồn tại,vui lòng nhập email khác !',
            ]
        );
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $admin = new Admin();
            $admin->username = $request->username;
            $admin->password = bcrypt($request->password);
            $admin->email = $request->email;
            $admin->level = $request->level;
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $extension = $file->getClientOriginalExtension();
                $avatar = time() . '.' . $extension;
                $file->move('uploads/avatars/', $avatar);
            }
            $admin->avatar = $avatar;
            $admin->save();
            return redirect()->route('admin.index')->with('mess', 'thêm người dùng thành công!');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data['admins'] = Admin::findOrFail($id);
//        dd($data['admins']);exit();
        return view('admin::layouts.admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
//        dd(($request->hasFile('images')));exit();
        $valid = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'min:6',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'images' => 'mimes:jpg,png,jpeg'
        ], [
                'username.required' => 'UserName không được bỏ trống!',
                'password.required' => 'Mật Khẩu Không Được Để Trống!',
                'password.min' => 'mật khẩu phải lớn hơn 6 ký tự !',
                'images.mimes' => 'Định dạng không cho phép!',
                'email.required' => 'Email không được để trống!',
                'email.email' => 'Sai định dạng email',
                'email.unique' => 'Email đã tồn tại,vui lòng nhập email khác !',
            ]
        );
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $admin->username = $request->username;
            $admin->password = bcrypt($request->password);
            $admin->level = $request->level;
            $admin->email = $request->email;
            $file_path = 'uploads/avatars/' . $admin->avatar;
//            dd($request->images);exit();
            if ($request->hasFile('images') && $request->images) {
                if (file_exists($file_path)) {
                    File::delete($file_path);
                }
                $file = $request->file('images');
                $extension = $file->getClientOriginalExtension();
                $avatar = time() . '.' . $extension;
                $file->move('uploads/avatars/', $avatar);
                $admin->avatar = $avatar;
            }
            $admin->save();
            return redirect()->route('admin.index')->with('mess', 'Cập nhật người dùng thành công!');
        }
    }

    /*Chức năng kiểm duyệt Người Dùng*/
    public
    function approve($id)
    {
        $admin = Admin::find($id);
        $admin->update(['active' => 1]);
        return redirect()->back()->with('mess', 'Người dùng ' . $admin->username . ' đã được kích hoạt');
    }

    public
    function unapprove($id)
    {
        $admin = Admin::find($id);
        $admin->update(['active' => 0]);
        return redirect()->back()->with('mess', 'Bỏ hoạt động Người dùng thành công');
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public
    function destroy($id)
    {
        $record = Admin::findOrFail($id);
//        dd($record->avatar);
        $file_path = 'uploads/avatars/' . $record->avatar;
        if (file_exists($file_path)) {
            File::delete($file_path);
        }
        $record->delete();
        return redirect()->back()->with('mess', 'Xóa Thành Công Người Dùng  ' . $record->username);

    }

    function detail($id)
    {
        $data['data'] = $id;
        $data['admins'] = Admin::find($id);
        return view('admin::layouts.admin.profile', $data);
    }

    public function avatar(Request $request, $id)
    {
        // lấy id từ jax truyền qua
        $getid = $request->id;
        $admin = Admin::find($getid);
        if ($getid) {
            $file_path = 'uploads/avatars/' . $admin->avatar;
            if (file_exists($file_path)) {
                File::delete($file_path);
            }
            $data = $_POST['image'];
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);
            $imageName = time() . '.png';
            file_put_contents('uploads/avatars/' . $imageName, $data);
            $admin->avatar = $imageName;
            $admin->save();
        }

    }
}

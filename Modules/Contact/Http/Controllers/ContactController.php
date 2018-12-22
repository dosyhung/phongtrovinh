<?php

namespace Modules\Contact\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['contacts'] =Contact::all();
        return view('contact::index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('contact::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd($request->all());exit();
        $valid=Validator::make($request->all(),[
            'name'=>'required',
            'phone'=>'required|max:11',
            'email'=>'required',
        ],[
            'name.required'=>'Vui lòng nhập tên quản lý',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'email.required'=>'Vui lòng nhập mail',
            'phone.max'=>'Số điện thoại không quá 11 số'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
           $contact = new Contact();
           $contact->name=$request->name;
           $contact->phone=$request->phone;
           $contact->email =$request->email;
           $contact->description =$request->description;
           $contact->content_contact =$request->noidung;
           $contact->save();
           return redirect()->route('contact.index')->with('mess','Thêm thành công!');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('contact::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data['contacts']=Contact::findOrFail($id);
        return view('contact::edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $contact= Contact::findOrFail($id);
        $valid = Validator::make($request ->all(),[
            'name'=>'required',
            'phone'=>'required|max:11',
            'email'=>'required',
        ],[
            'name.required'=>'Vui lòng nhập tên quản lý',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'email.required'=>'Vui lòng nhập mail',
            'phone.max'=>'Số điện thoại không quá 11 số'
        ]);
        if($valid ->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $contact->name=$request->name;
            $contact->phone=$request->phone;
            $contact->email =$request->email;
            $contact->description =$request->description;
            $contact->content_contact =$request->noidung;
            $contact->save();
            return redirect()->route('contact.index')->with('mess','Cập nhật thành công!');
        }
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $delete =Contact::find($id);
        $delete->delete();
        return redirect()->back()->with('mess','Xóa thành công!');
    }
}

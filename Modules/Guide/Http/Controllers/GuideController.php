<?php

namespace Modules\Guide\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['guides'] =Guide::all();
        return view('guide::index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('guide::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd($request->all());exit();
        $valid = Validator::make($request->all(),[
            'noidung'=>'required',
            'title'=>'required',
            'sl_type'=>'required'
        ],[
            'noidung.required'=>'Vui lòng nhập nội dung !',
            'title.required'=>'Vui lòng nhập tiêu đề !',
            'sl_type.required'=>'Vui lòng chọn loại !'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $guide =new Guide();
            $guide->title=$request->title;
            $guide->slug=str_slug($request->title);
            $guide->content= $request->noidung;
            $guide->type =$request->sl_type;
            $guide->save();
            return redirect()->route('guide.index')->with('Thêm Thành Công !');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function edit($id){
        $data['guide'] = Guide::findOrFail($id);
        return view('guide::edit',$data);
    }
    public function update(Request $request,$id){
        $guide =Guide::findOrFail($id);
        $valid = Validator::make($request->all(),[
            'noidung'=>'required',
            'title'=>'required',
            'sl_type'=>'required'
        ],[
            'noidung.required'=>'Vui lòng nhập nội dung !',
            'title.required'=>'Vui lòng nhập tiêu đề !',
            'sl_type.required'=>'Vui lòng chọn loại !'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $guide->title=$request->title;
            $guide->slug=str_slug($request->title);
            $guide->content= $request->noidung;
            $guide->type =$request->sl_type;
            $guide->save();
            return redirect()->route('guide.index')->with('mess','Cập nhật Thành Công !');
        }
    }
    public function detail($id)
    {

        return view('guide::edit');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $guide = Guide::findOrFail($id);
        if(Auth::user()->level ==1){
            $guide->delete();
            return redirect()->back()->with('mess','xóa thành công !');
        }else{
            redirect()->back()->with('mess','Bạn không được phép xóa !');
        }
    }
}

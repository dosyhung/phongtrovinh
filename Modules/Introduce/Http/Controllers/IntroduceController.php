<?php

namespace Modules\Introduce\Http\Controllers;

use App\Models\Introduce;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class IntroduceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['introduce'] = Introduce::all();
        return view('introduce::index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('introduce::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'noidung' => 'required'
        ], [
            'noidung.required' => 'Không được bỏ trống trường này !'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $intro = new Introduce();
            $intro->content = $request->noidung;
            $intro->slug = str_slug("Giới Thiệu");
            $intro->save();
            return redirect()->route('introduce.index')->with('mess','Thêm thành công !');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('introduce::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data['intro'] = Introduce::findOrFail($id);
        return view('introduce::edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $intro = Introduce::findOrFail($id);
        $valid = Validator::make($request->all(), [
            'noidung' => 'required'
        ], [
            'noidung.required' => 'Không được bỏ trống trường này !'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $intro->content = $request->noidung;
            $intro->slug = str_slug("Giới Thiệu");
            $intro->save();
            return redirect()->route('introduce.index')->with('mess','Cập Nhật thành công !');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $intro = Introduce::findOrFail($id);
        $intro ->delete();
        return redirect() ->back()->with('mess','Xóa thành công !');
    }
}

<?php

namespace Modules\Category\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['categories'] =Category::all();
        return view('category::layouts.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['categories']=Category::all();
        return view('category::layouts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $valid = Validator::make($request->all(),[
            'name'=>'required|unique:category',
            ],
            [
            'name.required'=>'Vui Lòng Nhập Tên Chuyên Mục',
            'name.unique'=>'Tên Chuyên Mục Đã Tồn Tại !'
            ]
        );
        if($valid ->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $category = new Category();
            $category->name =$request->name;
            $category->slug=str_slug($request->name);
            $category->parent_id =$request->caterogy;
            $category->save();
            return redirect()->route('category.index')->with('mess','Thêm chuyên mục thành công ');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data['cates']=Category::findOrFail($id);
        $data['categories']=Category::all();
        return view('category::layouts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $cates =Category::findOrFail($id);
        $valid = Validator::make($request->all(),[
            'name'=>'required|unique:category,name,'.$id,
        ],
            [
                'name.required'=>'Vui Lòng Nhập Tên Chuyên Mục',
                'name.unique'=>'Tên Chuyên Mục Đã Tồn Tại !'
            ]
        );
        if($valid ->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $cates ->name =$request->name;
            $cates->slug=str_slug($request->name);
            $cates->parent_id =$request->caterogy;
            $cates->save();
            return redirect()->route('category.index')->with('mess','Cập nhật thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $cate =Category::findOrFail($id);
        $child =Category::where('parent_id',$id)->get()->count();
        if($child ==0){
            $cate->delete();
            return redirect()->back()->with('mess','xóa thành công');
        }else{
            return redirect()->back()->with('mess','Chuyên mục này chứa chuyên mục con! vui lòng xóa chuyên mục con trước khi xóa chuyên mục này!');
        }
    }
}

<?php

namespace Modules\News\Http\Controllers;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['news'] = News::all();
        return view('news::index',$data);
    }
    public  function  show(){
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['cates'] =Category::all();
        return view('news::create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'title'=>'required',
            'cate'=>'required',
            'content'=>'required'
        ],[
            'title.required'=>'Vui lòng nhập tiêu đề bài viết',
            'cate.required'=>'Vui lòng chọn danh mục',
            'content.required'=>'Vui lòng nhập nội dung'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $news = new News();
            $news->title= $request->title;
            $news->slug = str_slug($request->title);
            $news->content= $request->input('content');
            $news->admin_id = \Auth::user()->id;
            $news ->category_id = $request->cate;
            $news->news_hot= 0;
            $news->news_vip= 0;
            $news->save();
            return redirect()->route('news.index')->with('mess','Thêm Tin thành công !');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
//    public function show()
//    {
//        return view('news::show');
//    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('news::edit');
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
    public  function vip($id){
        $new = News::findOrFail($id);
        $new->update(['news_vip'=>1]);
        return redirect()->back();
    }
    public  function hot($id){
        $new = News::findOrFail($id);
        $new->update(['news_hot'=>1]);
        return redirect()->back();
    }
    public  function unvip($id){
        $new = News::findOrFail($id);
        $new->update(['news_vip'=>0]);
        return redirect()->back();
    }
    public  function unhot($id){
        $new = News::findOrFail($id);
        $new->update(['news_hot'=>0]);
        return redirect()->back();
    }
}

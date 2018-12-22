<?php

namespace Modules\Report\Http\Controllers;

use App\Models\Report;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['report'] =DB::table('report')
            ->join('room','report.room_id','=','room.id')
            ->select('room.name','report.status','report.id')->get();
        return view('report::index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['rooms']= Room::all();
        return view('report::create',$data);
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
            'select_report'=>'required'
        ],[
            'room.required'=>'Bạn chưa chọn Phòng',
            'select_report.required'=>'Bạn chưa chọn phản hồi'
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $report = new Report();
            $report->room_id=$request->room;
            $report->status=$request->select_report;
            $report->save();
            return redirect()->route('report.index')->with('mess','Thêm Thành Công');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('report::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('report::edit');
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

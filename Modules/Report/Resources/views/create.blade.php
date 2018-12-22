@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <section class="content-header">
        <small>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>
                        Trang chủ</a></li>
                <li><a href="javascript:void(0)">Phản Hồi</a></li>
                <li class="active">Thêm Phản Hồi</li>
            </ol>
        </small>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('report.create')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('room') ? 'has-error' : '' }}">
                                    <label for="level">Chọn Phòng</label> <i style="color: red">*</i>
                                    <select name="room" class="form-control">
                                        <option value="">---Chọn Phòng---</option>
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}">{{$room->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">{{$errors ->first('room')}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('star') ? 'has-error' : ''}}">
                                    <label for="level">Chọn Phản Hồi</label><i style="color: red">*</i>
                                    <select name="select_report" class="form-control">
                                        <option value="">---Lựa Chọn---</option>
                                        <option value="0">Phòng Đã Thuê</option>
                                        <option value="1">Còn Phòng</option>
                                    </select>
                                    <span class="help-block">{{$errors->first('star')}}</span>
                                </div>
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-success btn-flat">Tạo Report</button>
                                </div>
                                <div id="pf_foto"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.row -->
    </section>
    </div>
@endsection


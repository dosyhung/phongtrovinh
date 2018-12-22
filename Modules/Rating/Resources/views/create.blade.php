@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <section class="content-header">
        <small>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>
                        Trang chủ</a></li>
                <li><a href="javascript:void(0)">Đánh Giá</a></li>
                <li class="active">Thêm Đánh Giá</li>
            </ol>
        </small>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Đánh Giá Phòng</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('rating.create')}}" method="post" enctype="multipart/form-data">
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
                                    <label for="level">Chọn Điểm</label><i style="color: red">*</i>
                                    <select name="star" class="form-control">
                                        <option value="">---Lựa Chọn---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <span class="help-block">{{$errors->first('star')}}</span>
                                </div>
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-success btn-flat">Tạo Đánh Giá</button>
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


@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <section class="content-header">
        <small>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>
                        Trang chủ</a></li>
                <li><a href="javascript:void(0)">Liên Hệ</a></li>
                <li class="active">Thông Tin Liên Hệ</li>
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
                        <h3 class="box-title">Nhập Thông Tin</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('contact.create')}}" method="post" >
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('name') ? 'has-error' :''}}">
                                    <label for="name">Tên Quản Lý</label><i style="color: red;font-weight: bold">*</i>
                                    <input type="text" class="form-control " id="name" name="name"
                                           placeholder="name" value="{{old('name')}}">
                                    <span class="help-block">{{$errors->first('name')}}</span>
                                </div>
                                <div class="form-group {{$errors->has('email') ?'has-error' :''}}">
                                    <label for="email">Email address</label><i style="color: red;font-weight: bold">*</i>
                                    <input type="email" class="form-control " id="email"
                                           placeholder="Enter email" name="email" value="{{old('email')}}">
                                    <span class="help-block">{{$errors->first('email')}}</span>
                                </div>

                                <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                                    <label for="phone">Điện Thoại</label><i style="color: red;font-weight: bold">*</i>
                                    <input type="text" class="form-control" id="phone"
                                           name="phone" placeholder="điện thoại" value="{{old('phone')}}">
                                    <span class="help-block">{{$errors->first('phone')}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="description">Mô Tả</label>
                                    <textarea name="description" id="description"></textarea>

                                </div>
                                <div class="form-group {{$errors->has('noidung') ? 'has-error' : ''}}">
                                    <label for="noidung">Nội Dung</label>
                                    <textarea name="noidung" id="noidung"></textarea>
                                    <span class="help-block">{{$errors->first('noidung')}}</span>
                                </div>
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-primary btn-flat">Tạo Liên Hệ</button>
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
@section('script')
    <script src="{{ asset('plugin/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'noidung' );
    </script>
@endsection


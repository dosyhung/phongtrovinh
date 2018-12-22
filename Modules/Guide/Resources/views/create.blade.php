@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <section class="content-header">
        <small>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>
                        Trang chủ</a></li>
                <li><a href="javascript:void(0)">Hướng dẫn sử dụng</a></li>
                <li class="active">Nhập hướng dẫn sử dụng</li>
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
                        <h3 class="box-title">Nhập Hướng Dẫn</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('guide.create')}}" method="post" >
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('noidung') ? 'has-error' : ''}}">
                                    <label for="noidung">Nội Dung</label><i style="color: red;font-weight: bold">*</i>
                                    <textarea name="noidung" id="noidung"></textarea>
                                    <span class="help-block">{{$errors->first('noidung')}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                    <label for="title">Tiêu Đề</label><i style="color: red;font-weight: bold">*</i>
                                    <input type="text" class="form-control" name="title">
                                    <span class="help-block">{{$errors->first('title')}}</span>
                                </div>
                               <div class="form-group {{$errors->has('sl_type') ? 'has-error' : ''}}">
                                   <label for="sl_type">Loại Hướng Dẫn</label><i style="color: red;font-weight: bold">*</i>
                                   <select class="form-control" name="sl_type">
                                       <option value="" >chọn loại hướng dẫn</option>
                                       <option value="1">Hướng Dẫn Đăng Tin</option>
                                       <option value="2">Hướng Dẫn Nạp Tiền</option>
                                       <option value="3">Hướng Dẫn Đăng Ký Tài Khoản</option>
                                   </select>
                                   <span class="help-block">{{$errors->first('sl_type')}}</span>
                               </div>
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-primary btn-flat">Tạo Hướng Dẫn</button>
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
        CKEDITOR.replace( 'noidung' );
    </script>
@endsection


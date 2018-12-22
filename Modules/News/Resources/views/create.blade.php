@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <small>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>
                            Trang chủ</a></li>
                    <li><a href="javascript:void(0)">Tin Tức</a></li>
                    <li class="active">Thêm Tin</li>
                </ol>
            </small>
        </section>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                @include('backend.thongbao')
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nhập Thông Tin</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('news.create')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group {{$errors->has('cate') ? 'has-error' : ''}}">
                                        <label for="">Chọn Chuyên Mục</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <select name="cate" id="cate" class="form-control">
                                            <option value="">Chọn danh mục</option>
                                            @foreach($cates as $cate)
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">{{$errors->first('cate')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('title') ? 'has-error' :''}}">
                                        <label for="title">Tiêu Đề Bài Viết</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <input type="text" class="form-control " id="title" name="title"
                                               placeholder="Cho thuê phòng trọ khép kín..." value="{{old('title')}}">
                                        <span class="help-block">{{$errors->first('title')}}</span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{$errors->has('content') ? 'has-error' : ''}}">
                                        <label for="content">Nội Dung Bài Viết</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <textarea name="content" id="content"></textarea>
                                        <span class="help-block">{{$errors->first('content')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat">Tạo Bài Viết</button>
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
        CKEDITOR.replace('content');
        CKEDITOR.replace('noidung');
    </script>
@endsection


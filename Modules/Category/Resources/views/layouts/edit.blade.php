@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <section class="content-header">
        <small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                <li><a href="{{route('admin.index')}}">Danh Sách</a></li>
                <li class="active">Sửa chuyên mục</li>
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
                        <h3 class="box-title">Sửa Chuyên Mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('category.update',['id'=>$cates->id])}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Tên Chuyên Mục</label><i style="color: red;font-weight: bold">*</i>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Tên chuyên mục..." value="{{$cates->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="caterogy">Chuyên Chuyên Mục Cha</label>
                                    <select name="caterogy" class="form-control">
                                        <option value="0">Không Chọn</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $cates->parent_id ?'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat">Tạo Chuyên Mục</button>
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


@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Cập Nhật Người Dùng
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                <li><a href="{{route('admin.index')}}">Danh Sách</a></li>
                <li class="active">Cập Nhật Người Dùng</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cập Nhật Người Dùng</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('admin.update',['id'=>$admins->id])}}" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text"
                                               class="form-control {{$errors->has('username') ?'is-invalid' :''}}"
                                               id="username" name="username"
                                               placeholder="username" value="{{$admins->username}}">
                                        <span class="" style="color: red">{{$errors->first('username')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email"
                                               class="form-control {{$errors->has('email') ?'is-invalid' :''}}"
                                               id="email"
                                               placeholder="Enter email" name="email" value="{{$admins->email}}">
                                        <span class="" style="color: red">{{$errors->first('email')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password"
                                               class="form-control {{$errors->has('password') ?'is-invalid' :''}}"
                                               id="password"
                                               name="password" placeholder="Password" value="{{$admins->password}}">
                                        <span class="" style="color: red">{{$errors->first('password')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Cấp bậc</label>
                                        <select name="level" class="form-control">
                                            <option value="1" {{$admins->level ==1 ?'selected' : ''}}>Administrator
                                            </option>
                                            <option value="2" {{$admins->level ==2 ?'selected' : ''}}>Biên tập viên
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <img src="{{asset('uploads/avatars/'.$admins->avatar)}}" width="80px"
                                                 height="80px" alt="">
                                        </div>
                                        <label for="Images">Chọn ảnh</label>
                                        <input type="file"
                                               class="form-control {{$errors->has('images') ? 'is-invalid': ''}}"
                                               id="images" name="images">
                                        <span class="" style="color: red">{{$errors->first('images')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat">Cập Nhật Người Dùng</button>
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


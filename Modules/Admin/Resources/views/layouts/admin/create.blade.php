@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <small>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>
                            Trang chủ</a></li>
                    <li><a href="javascript:void(0)">Người dùng</a></li>
                    <li class="active">Thêm người dùng</li>
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
                            <h3 class="box-title">Nhập Người Dùng</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('admin.create')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                               placeholder="username" value="{{old('username')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email"
                                               class="form-control {{$errors->has('email') ?'is-invalid' :''}}"
                                               id="email"
                                               placeholder="Enter email" name="email" value="{{old('email')}}">
                                        <span class="" style="color: red">{{$errors->first('email')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                               name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Cấp bậc</label>
                                        <select name="level" class="form-control">
                                            <option value="1" {{old('level') == 1 ? 'selected' : ''}}>Administrator
                                            </option>
                                            <option value="2" {{old('level') == 2 ? 'selected' : ''}}>Biên tập viên
                                            </option>
                                            <option value="3" {{old('level') == 3 ? 'selected' : ''}}>Member</option>
                                        </select>
                                    </div>
                                    <div>
                                        <img id="blah"  src=""  width="150px" alt="">
                                    </div>
                                    <div class="form-group">

                                        <label for="Images">Chọn ảnh</label>
                                        <input type="file"
                                               class="form-control {{$errors->has('images') ? 'is-invalid': ''}}"
                                               id="images" name="images">
                                        <span class="" style="color: red">{{$errors->first('images')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat">Tạo Người Dùng</button>
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
    <script>
        //hien thi anh dc chon
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#images").change(function() {
            readURL(this);
        });
    </script>
@endsection


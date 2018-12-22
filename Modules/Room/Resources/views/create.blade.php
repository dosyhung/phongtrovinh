@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <small>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>
                            Trang chủ</a></li>
                    <li><a href="javascript:void(0)">Phòng</a></li>
                    <li class="active">Thêm Phòng</li>
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
                        <form action="{{route('room.create')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group {{$errors->has('name') ? 'has-error' :''}}">
                                        <label for="name">Tiêu Đề Phòng</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <input type="text" class="form-control " id="name" name="name"
                                               placeholder="Cho thuê phòng trọ khép kín..." value="{{old('name')}}">
                                        <span class="help-block">{{$errors->first('name')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                                        <label for="description">Mô Tả</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <textarea name="description" id="description"></textarea>
                                        <span class="help-block">{{$errors->first('description')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('room_area') ? 'has-error' :''}}">
                                        <label for="room_area">Diện Tích</label><i style="color: red;font-weight: bold">*</i>
                                        <input type="text" class="form-control " id="room_area" name="room_area"
                                               placeholder="diện tích (m2)" value="{{old('room_area')}}">
                                        <span class="help-block">{{$errors->first('room_area')}}</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="address">Chọn Tỉnh / Thành Phố</label><i
                                                    style="color: red;font-weight: bold">*</i>
                                            <select name="province" id="province" class="form-control">
                                                <option value="">Chọn Tỉnh / Tp</option>
                                                @foreach(json_decode($province) as $prov)
                                                    <option value="{{$prov->province_id}}">{{$prov->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block">{{$errors->first('province')}}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address">Chọn Quận / Huyện</label><i
                                                    style="color: red;font-weight: bold">*</i>
                                            <select name="district" id="district" class="form-control">
                                                <option value="">Chọn Quận / Huyện</option>

                                            </select>
                                            <span class="help-block">{{$errors->first('district')}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="address">Chọn Xã / Phường</label><i
                                                    style="color: red;font-weight: bold">*</i>
                                            <select name="village" id="village" class="form-control">
                                                <option value="">Chọn Xã / Phường</option>
                                            </select>
                                            <span class="help-block">{{$errors->first('village')}}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                                                <label for="phone">Điện Thoại</label><i
                                                        style="color: red;font-weight: bold">*</i>
                                                <input type="text" class="form-control" id="phone"
                                                       name="phone" placeholder="điện thoại" value="{{old('phone')}}">
                                                <span class="help-block">{{$errors->first('phone')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('address') ?'has-error' :''}}">
                                        <label for="address">Địa Chỉ Cụ Thể</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <input type="text" class="form-control " id="address"
                                               placeholder="Nhập địa chỉ..." name="address" value="{{old('address')}}">
                                        <span class="help-block">{{$errors->first('address')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{$errors->has('original_price') ? 'has-error' : ''}}">
                                        <label for="phone">Nhập Giá Phòng</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <input type="text" class="form-control" id="original_price"
                                               name="original_price" placeholder="12000"
                                               value="{{old('original_price')}}">
                                        <span class="help-block">{{$errors->first('original_price')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('sale_price') ? 'has-error' : ''}}">
                                        <label for="phone">Nhập Giá Phòng Khuyến Mãi</label>
                                        <input type="text" class="form-control" id="sale_price"
                                               name="sale_price" placeholder="800" value="{{old('sale_price')}}">
                                        <span class="help-block">{{$errors->first('sale_price')}}</span>
                                    </div>
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
                                    <div class="form-group {{$errors->has('avatar') ? 'has-error' : ''}}">
                                        <img id="blah"  src=""  width="150px" alt="">
                                        <label for="">Chọn Ảnh Đại Diện</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <input type="file" name="avatar" id="avatar" class="form-control"/>
                                        <span class="help-block">{{$errors->first('avatar')}}</span>
                                    </div>
                                    <div class="gallery">
                                        <!-- <img id="blah"  src=""  width="150px" alt=""> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="">Chọn Ảnh Thumnail</label>
                                        <input  type="file" name="images[]" id="images" class="form-control" multiple/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat">Tạo Phòng</button>
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
    <script src="{{asset('plugin/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
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

        $("#avatar").change(function() {
            readURL(this);
        });

        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img width="100px" height="100px" style="padding-right:2px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });

    </script>
    <script type="text/javascript">
        //loc ra huyen theo id tinh
        $("#province").on('change', function (e) {
            var province_id = e.target.value;
            $.get('/phongtrovinh/public/room/district?province_id=' + province_id, function (data) {
                $("#district").empty();
                $("#district").append('<option value="">Chọn Quận / Huyện</option>');
                $.each(data, function (index, obj) {
                    $("#district").append('<option value="' + obj.district_id + '">' + obj.name + '</option>');
                })
            })
        })
        //ket thuc loc huyen

        //loc ra phuong theo id huyen
        $("#district").on('change', function (e) {
            var district_id = e.target.value;
            $.get('/phongtrovinh/public/room/village?district_id=' + district_id, function (data) {
                $("#village").empty();
                $("#village").append('<option value="">Chọn Xã / Phường</option>');
                $.each(data, function (index, obj) {
                    $("#village").append('<option value="' + obj.village_id + '">' + obj.name + '</option>');
                })
            })
        })
        //ket thuc loc phuong
    </script>
@endsection


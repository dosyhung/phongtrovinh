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
                    <li class="active">Sửa Phòng</li>
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
                        <form action="{{route('room.update',['id'=>$room->id])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group {{$errors->has('name') ? 'has-error' :''}}">
                                        <label for="name">Tiêu Đề Phòng</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <input type="text" class="form-control " id="name" name="name"
                                               placeholder="Cho thuê phòng trọ khép kín..." value="{{$room->name}}">
                                        <span class="help-block">{{$errors->first('name')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                                        <label for="description">Mô Tả</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <textarea name="description" id="description">
                                            {!! $room->description !!}
                                        </textarea>
                                        <span class="help-block">{{$errors->first('description')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('room_area') ? 'has-error' :''}}">
                                        <label for="room_area">Diện Tích</label><i style="color: red;font-weight: bold">*</i>
                                        <input type="text" class="form-control " id="room_area" name="room_area"
                                               placeholder="diện tích (m2)" value="{{$room->area_room}}">
                                        <span class="help-block">{{$errors->first('room_area')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('address') ?'has-error' :''}}">
                                        <label for="address">Địa Chỉ</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <input type="text" class="form-control " id="address"
                                               placeholder="Nhập địa chỉ..." name="address" value="{{$room->address}}">
                                        <span class="help-block">{{$errors->first('address')}}</span>
                                    </div>

                                    <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                                        <label for="phone">Điện Thoại</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <input type="text" class="form-control" id="phone"
                                               name="phone" placeholder="điện thoại" value="{{$room->phone}}">
                                        <span class="help-block">{{$errors->first('phone')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{$errors->has('original_price') ? 'has-error' : ''}}">
                                        <label for="phone">Nhập Giá Phòng</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <input type="text" class="form-control" id="original_price"
                                               name="original_price" placeholder="12000"
                                               value="{{$room->original_price}}">
                                        <span class="help-block">{{$errors->first('original_price')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('sale_price') ? 'has-error' : ''}}">
                                        <label for="phone">Nhập Giá Phòng Khuyến Mãi</label>
                                        <input type="text" class="form-control" id="sale_price"
                                               name="sale_price" placeholder="800" value="{{$room->sale_price}}">
                                        <span class="help-block">{{$errors->first('sale_price')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('cate') ? 'has-error' : ''}}">
                                        <label for="">Chọn Chuyên Mục</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <select name="cate" id="cate" class="form-control">
                                            <option value="">Chọn danh mục</option>
                                            @foreach($cates as $cate)
                                                <option value="{{$cate->id}}" {{$room->category_id == $cate->id ? 'selected' : ''}}>{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">{{$errors->first('cate')}}</span>
                                    </div>

                                    <div class="form-group {{$errors->has('province') ? 'has-error' : ''}}">
                                        <label for="">Chọn Tỉnh/Tp</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <select name="province" id="province" class="form-control">
                                            <option value="">Chọn Tỉnh/Tp</option>
                                            @foreach(json_decode($provinces) as $province)
                                                <option value="{{$province->province_id}}" {{$room->province_id == $province->province_id ? 'selected' : ''}}>{{$province->name}}</option>
                                                {{--<option value="{{$province->province_id}}">{{$province->name}}</option>--}}
                                            @endforeach
                                        </select>
                                        <span class="help-block">{{$errors->first('province')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('district') ? 'has-error' : ''}}">
                                        <label for="">Chọn Quận/Huyện</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <select name="district" id="district" class="form-control">
                                            <option value="">Chọn Quận/Huyện</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}" {{$room->district_id == $district->district_id ? 'selected' : ''}}>{{$district->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">{{$errors->first('district')}}</span>
                                    </div>
                                    <div class="form-group {{$errors->has('village') ? 'has-error' : ''}}">
                                        <label for="">Chọn Xã/Phường</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <select name="village" id="village" class="form-control">
                                            <option value="">Chọn Xã/Phường</option>
                                            @foreach($villages as $village)
                                                <option value="{{$village->id}}" {{$room->village_id == $village->village_id ? 'selected' : ''}}>{{$village->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">{{$errors->first('cate')}}</span>
                                    </div>

                                    <div>
                                        <img src="{{asset('uploads/images/'.$room->images)}}" width="80px" height="80px" alt="">
                                    </div>
                                    <div class="form-group {{$errors->has('avatar') ? 'has-error' : ''}}">
                                        <label for="">Chọn Ảnh Đại Diện</label><i
                                                style="color: red;font-weight: bold">*</i>
                                        <input type="file" name="avatar" id="avatar" class="form-control" value="{{$room->images}}"/>
                                        <span class="help-block">{{$errors->first('avatar')}}</span>
                                    </div>
                                    <div>
                                        @foreach($attr as $att)
                                            <img src="{{asset('uploads/images/'.$att->images)}}" width="60px" height="60px" alt="">
                                        @endforeach

                                    </div>
                                    <div class="form-group">
                                        <label for="">Chọn Ảnh Thumnail</label>
                                        <input type="file" name="images[]" id="images" value="{{old('images')}}" class="form-control" multiple/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat">Cập Nhật Phòng</button>
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
        CKEDITOR.replace('description');
        CKEDITOR.replace('noidung');
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


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
                <li class="active">danh sách người dùng</li>
            </ol>
        </small>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    @include('backend.thongbao')
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a href="{{route('room.create')}}" class="btn btn-primary btn-flat" style="margin-bottom: 10px;float: right"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Chuyên Mục </a>
                        <div style="clear: both"></div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Tên Phòng</th>
                                    <th class="text-center">Diện Tích</th>
                                    <th class="text-center">Hình Ảnh</th>
                                    <th class="text-center">Trạng Thái</th>
                                    <th class="text-center">Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                <tr>
                                    <td class="text-center">{{$room->name}}</td>
                                    <td class="text-center">{{$room->area_room}} m<sup>2</sup></td>
                                    <td class="text-center"><img src="{{asset('uploads/images/'.$room->images)}}"
                                       width="60px" height="60px" alt=""></td>
                                       <td class="text-center">
                                        @if($room->active ==0)
                                        <p class="label label-warning"><a href="#modalapprove{{$room->id}}"
                                          data-toggle="modal">Chưa kích hoạt</a>
                                      </p>
                                      @else
                                      <p class="label label-primary"><a href="#modalunapprove{{$room->id}}"
                                          data-toggle="modal">Đã kích hoạt</a>
                                      </p>
                                      @endif
                                  </td>
                                  <td class="text-center">
                                    <!-----Kiểm Tra nếu người dùng là Admin thì mới có quyền xóa hoặc sửa------->
                                    @can('show-profile')
                                    <a data-toggle="modal" href="#modal-id{{$room->id}}"
                                     class="btn btn-danger"><i class="fa fa-trash-o"
                                     aria-hidden="true"></i></a>
                                     <a href="{{route('room.edit',['id'=>$room->id])}}"
                                         class="btn btn-warning"><i class="fa fa-pencil"
                                         aria-hidden="true"></i></a>
                                         @endcan
                                         <!----- Kết Thúc Kiểm Tra nếu người dùng là Admin thì mới có quyền xóa hoặc sửa------->
                                         <a href="{{route('admin.detail',['id'=>$room->id])}}"
                                             class="btn btn-info"><i
                                             class="fa fa-info-circle" aria-hidden="true"></i></a>
                                         </td>
                                     </tr>
                                     <!--Modal xác nhận xóa--->
                                     <div class="modal fade" id="modal-id{{$room->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        <i class="fa fa-th" aria-hidden="true"></i>
                                                        <strong>Confirm Delete</strong>
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    Do you really want to delete this record?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="button" class="btn btn-primary"><a
                                                        href="{{route('room.delete',['id'=>$room->id])}}">Delete</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal xác nhận xóa--->
                                    <!--Modal active--->
                                    <div class="modal fade" id="modalapprove{{$room->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        <i class="fa fa-th" aria-hidden="true"></i>
                                                        <strong>Confirm active</strong>
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    Kích hoạt phòng này ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="button" class="btn btn-primary"><a
                                                        href="{{route('room.approve',['id'=>$room->id])}}">Xác
                                                    Nhận</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal active--->
                                    <!--Modal remove active--->
                                    <div class="modal fade" id="modalunapprove{{$room->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        <i class="fa fa-th" aria-hidden="true"></i>
                                                        <strong>Confirm remove active</strong>
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    Bỏ kích hoạt phòng này ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="button" class="btn btn-primary"><a
                                                        href="{{route('room.unapprove',['id'=>$room->id])}}">Xác
                                                    Nhận</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal remove active--->
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">Tên Phòng</th>
                                        <th class="text-center">Diện Tích</th>
                                        <th class="text-center">Hình Ảnh</th>
                                        <th class="text-center">Trạng Thái</th>
                                        <th class="text-center">Chức Năng</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    @endsection
    @section('script')
    <!-----cho phép thông báo hiển thị trong 2s-->
    <script>
        jQuery(document).ready(function ($) {
            $('.mess,.mess_delete').delay(2000).slideUp();
        });
    </script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
    @endsection
    @section('style')
    <link rel="stylesheet" href="{{asset('css/modal.css')}}">
    @endsection
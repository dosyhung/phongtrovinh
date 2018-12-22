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
                        <a href="{{route('admin.create')}}" class="btn btn-primary btn-flat" style="margin-bottom: 10px;float: right"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Người Dùng </a>
                        <div style="clear: both"></div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">username</th>
                                <th class="text-center">level</th>
                                <th class="text-center">email</th>
                                <th class="text-center">avatar</th>
                                <th class="text-center">Kích Hoạt Người Dùng</th>
                                <th class="text-center">Chức Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td class="text-center">{{$admin->username}}</td>
                                    <td class="text-center">{{$admin->level ==1 ? 'Quản Trị Viên' : 'Biên tập viên'}}</td>
                                    <td class="text-center">{{$admin->email}}</td>
                                    <td class="text-center"><img src="{{asset('uploads/avatars/'.$admin->avatar)}}"
                                                                 width="60px" height="60px" alt=""></td>
                                    <td class="text-center">
                                        @if($admin->active ==0)
                                            <p class="label label-warning"><a href="#modalapprove{{$admin->id}}"
                                                                              data-toggle="modal">Chưa kích hoạt</a></p>
                                        @else
                                            <p class="label label-primary"><a href="#modalunapprove{{$admin->id}}"
                                                                              data-toggle="modal">Đã kích hoạt</a></p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <!-----Kiểm Tra nếu người dùng là Admin thì mới có quyền xóa hoặc sửa------->
                                        @can('show-profile')
                                            <a data-toggle="modal" href="#modal-id{{$admin->id}}"
                                               class="btn btn-danger"><i class="fa fa-trash-o"
                                                                         aria-hidden="true"></i></a>
                                            <a href="{{route('admin.edit',['id'=>$admin->id])}}"
                                               class="btn btn-warning"><i class="fa fa-pencil"
                                                                          aria-hidden="true"></i></a>
                                    @endcan
                                    <!----- Kết Thúc Kiểm Tra nếu người dùng là Admin thì mới có quyền xóa hoặc sửa------->
                                        <a href="{{route('admin.detail',['id'=>$admin->id])}}" class="btn btn-info"><i
                                                    class="fa fa-info-circle" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <!--Modal xác nhận xóa--->
                                <div class="modal fade" id="modal-id{{$admin->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
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
                                                            href="{{route('admin.delete',['id'=>$admin->id])}}">Delete</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Modal xác nhận xóa--->
                                <!--Modal active--->
                                <div class="modal fade" id="modalapprove{{$admin->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
                                                <h4 class="modal-title">
                                                    <i class="fa fa-th" aria-hidden="true"></i>
                                                    <strong>Confirm active</strong>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                Kích hoạt người dùng này ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy
                                                </button>
                                                <button type="button" class="btn btn-primary"><a
                                                            href="{{route('admin.approve',['id'=>$admin->id])}}">Xác
                                                        Nhận</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Modal active--->
                                <!--Modal remove active--->
                                <div class="modal fade" id="modalunapprove{{$admin->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
                                                <h4 class="modal-title">
                                                    <i class="fa fa-th" aria-hidden="true"></i>
                                                    <strong>Confirm remove active</strong>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                Bỏ hoạt động người dùng này ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy
                                                </button>
                                                <button type="button" class="btn btn-primary"><a
                                                            href="{{route('admin.unapprove',['id'=>$admin->id])}}">Xác
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
                                <th>username</th>
                                <th>level</th>
                                <th>email</th>
                                <th>avatar</th>
                                <th>active</th>
                                <th>Chức Năng</th>
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
    <script>
        jQuery(document).ready(function ($) {
            $('.mess').delay(2000).slideUp();
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
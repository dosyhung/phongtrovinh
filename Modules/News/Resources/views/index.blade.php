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
                       <a href="{{route('news.create')}}" class="btn btn-primary btn-flat" style="margin-bottom: 10px;float: right"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Tin Mới </a>
                       <div style="clear: both"></div>
                       <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Tiêu Đề</th>
                                <th class="text-center">Người Đăng</th>
                                <th class="text-center">Chuyên Mục</th>
                                <th class="text-center">Đặt Tin Nổi Bật</th>
                                <th class="text-center">Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $new)
                            <tr>
                                <td class="text-center">{{$new->title}}</td>
                                <td class="text-center">
                                    {{$new->admins->username}}
                                </td>
                                <td class="text-center">{{$new->category->name}}</td>
                                <td class="text-center">
                                    @can('show-profile')
                                    @if($new->news_vip != 1)
                                    <a href="#modalvip{{$new->id}}"
                                     data-toggle="modal" class="label label-danger"
                                     title="Đặt làm tin Vip">Kích hoạt Vip</a>
                                     @else
                                     <a href="#modalunvip{{$new->id}}" data-toggle="modal"  class="label label-success">Đã là tin vip</a>
                                     @endif
                                     @if($new->news_hot != 1)
                                     <a href="#modalhot{{$new->id}}" data-toggle="modal"
                                         class="label label-warning" title="Đặt làm tin Hot">kich hoạt
                                     Hot</a>
                                     @else
                                     <a href="#modalunhot{{$new->id}}" data-toggle="modal" class="label label-info">Đã là tin Hot</a>
                                     @endif
                                     @endcan
                                 </td>
                                 <td class="text-center">
                                    <!-----Kiểm Tra nếu người dùng là Admin thì mới có quyền xóa hoặc sửa------->
                                    @can('show-profile')
                                    <a data-toggle="modal" href="#modal-id{{$new->id}}"
                                     class="btn btn-danger"><i class="fa fa-trash-o"
                                     aria-hidden="true"></i></a>
                                     <a href="{{route('admin.edit',['id'=>$new->id])}}"
                                         class="btn btn-warning"><i class="fa fa-pencil"
                                         aria-hidden="true"></i></a>
                                         @endcan
                                         <!----- Kết Thúc Kiểm Tra nếu người dùng là Admin thì mới có quyền xóa hoặc sửa------->
                                         <a href="{{route('admin.detail',['id'=>$new->id])}}" class="btn btn-info"><i
                                            class="fa fa-info-circle" aria-hidden="true"></i></a>

                                        </td>
                                    </tr>
                                    <!--Modal xác nhận xóa--->
                                    <div class="modal fade" id="modal-id{{$new->id}}">
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
                                                    href="{{route('admin.delete',['id'=>$new->id])}}">Delete</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Modal xác nhận xóa--->
                                <!--Modal active VIP--->
                                <div class="modal fade" id="modalvip{{$new->id}}">
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
                                            Đặt tin này làm tin vip ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Hủy
                                            </button>
                                            <button type="button" class="btn btn-primary"><a
                                                href="{{route('news.activeVip',['id'=>$new->id])}}">Xác
                                            Nhận</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Modal active VIP--->
                            <!--Modal remove active VIP--->
                            <div class="modal fade" id="modalunvip{{$new->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;
                                        </button>
                                        <h4 class="modal-title">
                                            <i class="fa fa-th" aria-hidden="true"></i>
                                            <strong>Confirm </strong>
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        Hủy bỏ tin VIP ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            Hủy
                                        </button>
                                        <button type="button" class="btn btn-primary"><a
                                            href="{{route('news.unactiveVip',['id'=>$new->id])}}">Xác
                                        Nhận</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Modal remove active VIP--->

                        <!--Modal  active HOT--->
                        <div class="modal fade" id="modalhot{{$new->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;
                                    </button>
                                    <h4 class="modal-title">
                                        <i class="fa fa-th" aria-hidden="true"></i>
                                        <strong>Confirm active hot</strong>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    Đặt làm tin hot ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Hủy
                                    </button>
                                    <button type="button" class="btn btn-primary"><a
                                        href="{{route('news.activeHot',['id'=>$new->id])}}">Xác
                                    Nhận</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Modal active HOT--->

                    <!--Modal Remove active HOT--->
                    <div class="modal fade" id="modalunhot{{$new->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;
                                </button>
                                <h4 class="modal-title">
                                    <i class="fa fa-th" aria-hidden="true"></i>
                                    <strong>Confirm</strong>
                                </h4>
                            </div>
                            <div class="modal-body">
                                Bỏ tin hot ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Hủy
                                </button>
                                <button type="button" class="btn btn-primary"><a
                                    href="{{route('news.unactiveHot',['id'=>$new->id])}}">Xác
                                Nhận</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal Remove active HOT--->
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Tiêu Đề</th>
                    <th class="text-center">Người Đăng</th>
                    <th class="text-center">Chuyên Mục</th>
                    <th class="text-center">Đặt Tin Nổi Bật</th>
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
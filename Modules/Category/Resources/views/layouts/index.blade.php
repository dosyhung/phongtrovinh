@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <section class="content-header">
        <small>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>
                        Trang chủ</a></li>
                <li><a href="javascript:void(0)">Chuyên mục</a></li>
                <li class="active">danh sách chuyên mục</li>
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
                        <a href="{{route('category.create')}}" class="btn btn-primary btn-flat" style="margin-bottom: 10px;float: right"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Chuyên Mục </a>
                        <div style="clear: both"></div>
                       <?php
                            $stt=0;
                        ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên Chuyên Mục</th>
                                <th class="text-center">Chuyên Mục Cha</th>
                                <th class="text-center">Chức Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">
                                        <?php
                                         echo $stt = $stt +1;
                                        ?>
                                    </td>
                                    <td class="text-center">{{$category->name}}</td>
                                    <td class="text-center">
                                        <?php
                                        $cate=\App\Models\Category::find($category->id);
                                        $parent=$cate->parent()->first();
                                        if($parent != null){
                                            echo $parent['name'];
                                        }else{
                                            echo "không";
                                        }

                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!-----Kiểm Tra nếu người dùng là Admin thì mới có quyền xóa hoặc sửa------->
                                        @can('show-profile')
                                            <a data-toggle="modal" href="#modal-id{{$category->id}}"
                                               class="btn btn-danger"><i class="fa fa-trash-o"
                                                                         aria-hidden="true"></i></a>
                                            <a href="{{route('category.edit',['id'=>$category->id])}}"
                                               class="btn btn-warning"><i class="fa fa-pencil"
                                                                          aria-hidden="true"></i></a>
                                    @endcan
                                    <!----- Kết Thúc Kiểm Tra nếu người dùng là Admin thì mới có quyền xóa hoặc sửa------->
                                        <a href="{{route('category.detail',['id'=>$category->id])}}" class="btn btn-info"><i
                                                    class="fa fa-info-circle" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <!--Modal xác nhận xóa--->
                                <div class="modal fade" id="modal-id{{$category->id}}">
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
                                                            href="{{route('category.delete',['id'=>$category->id])}}">Delete</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Modal xác nhận xóa--->
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên Chuyên Mục</th>
                                <th class="text-center">Chuyên Mục Cha</th>
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
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('uploads/avatars/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->username}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Quản Lý Chức Năng</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard" style="color: #d35400"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <!-----Start------>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle-o" aria-hidden="true" style="color: #d35400"></i>
                    <span>Quản Lý Thành Viên</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.create')}}"><i class="fa fa-plus-circle" style="color: #e74c3c"></i>Thêm Thành Viên</a></li>
                    <li><a href="{{route('admin.index')}}"><i class="fa fa-list" style="color: #2980b9"></i>Danh Sách Thành Viên</a></li>
                </ul>
            </li>
            <!-----End------>

            <!-----Start------>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open" aria-hidden="true" style="color: #d35400"></i>
                    <span>Quản Lý Chuyên Mục</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.create')}}"><i class="fa fa-plus-circle" style="color: #e74c3c"></i>Thêm Chuyên Mục</a></li>
                    <li><a href="{{route('category.index')}}"><i class="fa fa-list" style="color: #2980b9"></i>Danh Sách Chuyên Mục</a>
                    </li>
                </ul>
            </li>
            <!-----End------>
            <!-----Start------>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home" aria-hidden="true" style="color: #d35400"></i>
                    <span>Quản Lý Phòng</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('room.create')}}"><i class="fa fa-plus-circle" style="color: #e74c3c"></i>Thêm Phòng</a></li>
                    <li><a href="{{route('room.index')}}"><i class="fa fa-list" style="color: #2980b9"></i>Danh Sách Phòng</a></li>
                </ul>
            </li>
            <!-----End------>

            <!-----Start------>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-card" aria-hidden="true" style="color: #d35400"></i>
                    <span>Quản Lý Liên Hệ</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('contact.create')}}"><i class="fa fa-plus-circle" style="color: #e74c3c"></i>Thêm Liên Hệ</a></li>
                    <li><a href="{{route('contact.index')}}"><i class="fa fa-list" style="color: #2980b9"></i>Xem Liên Hệ</a></li>
                </ul>
            </li>
            <!-----End------>
            <!-----Start------>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-book" aria-hidden="true" style="color: #d35400"></i>
                    <span>Hướng Dẫn Sử Dụng</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('guide.create')}}"><i class="fa fa-plus-circle" style="color: #e74c3c"></i>Thêm Hướng Dẫn</a></li>
                    <li><a href="{{route('guide.index')}}"><i class="fa fa-list" style="color: #2980b9"></i>Xem Hướng Dẫn</a></li>
                </ul>
            </li>
            <!-----End------>
            <!-----Start------>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-info-circle" aria-hidden="true" style="color: #d35400"></i>
                    <span>Giới Thiệu Trang</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('introduce.create')}}"><i class="fa fa-plus-circle" style="color: #e74c3c"></i>Thêm Giới Thiệu</a></li>
                    <li><a href="{{route('introduce.index')}}"><i class="fa fa-list" style="color: #2980b9"></i>Quản Lý Giới Thiệu</a></li>
                </ul>
            </li>
            <!-----End------>
            <!-----Start------>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true" style="color: #d35400"></i>
                    <span>Đánh Giá Phòng</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('rating.create')}}"><i class="fa fa-plus-circle" style="color: #e74c3c"></i>Thêm Đánh Giá</a></li>
                    <li><a href="{{route('rating.index')}}"><i class="fa fa-list" style="color: #2980b9"></i>Quản Lý Đánh Giá</a></li>
                </ul>
            </li>
            <!-----End------>

            <!-----Start------>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-flag" aria-hidden="true" style="color: #d35400"></i>
                    <span>Phản Hồi</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('report.create')}}"><i class="fa fa-plus-circle" style="color: #e74c3c"></i>Thêm Đánh Giá</a></li>
                    <li><a href="{{route('report.index')}}"><i class="fa fa-list" style="color: #2980b9"></i>Quản Lý Đánh Giá</a></li>
                </ul>
            </li>
            <!-----End------>

            <!-----Start------>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sliders" aria-hidden="true" style="color: #d35400"></i>
                    <span>Quản Lý Slide</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('report.create')}}"><i class="fa fa-plus-circle" style="color: #e74c3c"></i>Thêm Đánh Giá</a></li>
                    <li><a href="{{route('introduce.index')}}"><i class="fa fa-list" style="color: #2980b9"></i>Quản Lý Đánh Giá</a></li>
                </ul>
            </li>
            <!-----End------>
            <!-----Start------>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file" aria-hidden="true" style="color: #d35400"></i>
                    <span>Quản Lý Đăng Tin</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('news.create')}}"><i class="fa fa-plus-circle" style="color: #e74c3c"></i>Thêm Tin Mới</a></li>
                    <li><a href="{{route('news.index')}}"><i class="fa fa-list" style="color: #2980b9"></i>Danh Sách Tin</a></li>
                </ul>
            </li>
            <!-----End------>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Xin chào, Toàn</p>

                <a href="/users/logout"><i class="fa fa-power-off text-success"></i> Thoát</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Tìm kiếm..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="/">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Khóa học</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/courses/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                    <li><a href="/admin/courses/index/1"><i class="fa fa-angle-double-right"></i> Đang đăng ký</a></li>
                    <li><a href="/admin/courses/index/2"><i class="fa fa-angle-double-right"></i> Đủ điều kiện mở lớp</a></li>
                    <li><a href="/admin/courses/index/3"><i class="fa fa-angle-double-right"></i> Chưa hoàn thành</a></li>
                    <li><a href="/admin/courses/index/4"><i class="fa fa-angle-double-right"></i> Đã hoàn thành</a></li>
                    <li><a href="/admin/courses/index/5"><i class="fa fa-angle-double-right"></i> Đã hủy</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sign-in"></i> <span>Chứng nhận</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Quản lý sổ chứng nhận</a></li>
                    <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> In theo học viên</a></li>
                    <li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> In theo lớp</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Lĩnh vực</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/fields"><i class="fa fa-angle-double-right"></i> Danh sách lĩnh vực</a></li>
                    <li><a href="/admin/fields/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Chuyên đề</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/chapters"><i class="fa fa-angle-double-right"></i> Danh sách chuyên đề</a></li>
                    <li><a href="/admin/chapters/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>User</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/groups"><i class="fa fa-angle-double-right"></i> Danh sách nhóm</a></li>
                    <li><a href="/admin/groups/add"><i class="fa fa-angle-double-right"></i> Thêm nhóm</a></li>
                    <li><a href="/admin/acl_manager/acl"><i class="fa fa-angle-double-right"></i> Phân quyền</a></li>

                </ul>
            </li>

            <li>
                <a href="/admin/departments">
                    <i class="fa fa-calendar"></i> <span>Đơn vị</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sign-in"></i> <span>Thống kê</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Theo đơn vị</a></li>
                    <li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Theo lĩnh vực</a></li>
                    <li><a href="pages/examples/404.html"><i class="fa fa-angle-double-right"></i> Theo chuyên đề</a></li>
                    <li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Tập huấn viên</a></li>
                    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Khoảng thời gian</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Cấu hình</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Phương thức đăng nhập</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
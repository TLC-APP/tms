<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
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
            <li>
                <a href="/manager">
                    <i class="fa fa-dashboard"></i> <span>Bàn làm việc</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Khóa học</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="/manager/courses/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> Đang đăng ký', array('manager' => true, 'controller' => 'courses', 'action' => 'index', COURSE_REGISTERING), array('escape' => false)); ?>
                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> Chưa hoàn thành', array('manager' => true, 'controller' => 'courses', 'action' => 'index', COURSE_UNCOMPLETED), array('escape' => false)); ?>
                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Đã hoàn thành', array('manager' => true, 'controller' => 'courses', 'action' => 'index', COURSE_COMPLETED), array('escape' => false)); ?>
                    </li>
                     <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Đã hủy', array('manager' => true, 'controller' => 'courses', 'action' => 'index', COURSE_CANCELLED), array('escape' => false)); ?>
                    </li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Lĩnh vực</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/manager/fields"><i class="fa fa-angle-double-right"></i> Danh sách lĩnh vực</a></li>
                    <li><a href="/manager/fields/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Chuyên đề</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/manager/chapters"><i class="fa fa-angle-double-right"></i> Danh sách chuyên đề</a></li>
                    <li><a href="/manager/chapters/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Đơn vị</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/manager/departments/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                    <li><a href="/manager/departments"><i class="fa fa-angle-double-right"></i> Danh sách</a></li>

                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Người dùng</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/manager/users/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                    <li><a href="/manager/users"><i class="fa fa-angle-double-right"></i> Danh sách user</a></li>
                    

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sign-in"></i> <span>Chứng nhận</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Quản lý sổ chứng nhận</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> In theo học viên</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> In theo lớp</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sign-in"></i> <span>Thống kê</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Theo đơn vị</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Theo lĩnh vực</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Theo chuyên đề</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Tập huấn viên</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Khoảng thời gian</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Cấu hình</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Phương thức đăng nhập</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
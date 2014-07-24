<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                
                <input type="text" name="q" class="form-control" placeholder="Tìm kiếm..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat">
                        <i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Khóa học</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Thêm mới</span>', array('controller' => 'courses', 'action' => 'add', 'fields_manager' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Đang đăng ký</span>', array('controller' => 'courses', 'action' => 'index', 'fields_manager' => true, COURSE_REGISTERING), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Chưa hoàn thành</span>', array('controller' => 'courses', 'action' => 'index', 'fields_manager' => true, COURSE_UNCOMPLETED), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Đã hoàn thành</span>', array('controller' => 'courses', 'action' => 'index', 'fields_manager' => true, COURSE_COMPLETED), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Đã hủy</span>', array('controller' => 'courses', 'action' => 'index', 'fields_manager' => true, COURSE_CANCELLED), array('escape' => false)); ?></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Chuyên đề</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Thêm mới</span>', array('controller' => 'chapters', 'action' => 'add', 'fields_manager' => true), array('escape' => false)); ?></li>
                    <li> <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Danh sách</span>', array('controller' => 'chapters', 'action' => 'index', 'fields_manager' => true), array('escape' => false)); ?></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-md"></i>
                    <span>Tập huấn viên</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Thêm mới</span>', array('action' => 'add','controller' => 'users','fields_manager' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Danh sách</span>', array('action' => 'index','controller' => 'users','fields_manager' => true), array('escape' => false)); ?></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
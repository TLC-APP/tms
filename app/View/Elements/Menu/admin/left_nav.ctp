<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <form action="<?php echo SUB_DIR;?>/admin/users/search" method="post" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Nhập tên user cần tìm..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="<?php echo SUB_DIR;?>/admin/">
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
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Thêm mới</span>', array('controller' => 'courses', 'action' => 'add', 'admin' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Đang đăng kí</span>', array('controller' => 'courses', 'action' => 'index', 'admin' => true, COURSE_REGISTERING), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Chưa hoàn thành</span>', array('controller' => 'courses', 'action' => 'index', 'admin' => true, COURSE_UNCOMPLETED), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Đã hoàn thành</span>', array('controller' => 'courses', 'action' => 'index', 'admin' => true, COURSE_COMPLETED), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Đã hủy</span>', array('controller' => 'courses', 'action' => 'index', 'admin' => true, COURSE_CANCELLED), array('escape' => false)); ?></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Lĩnh vực</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                     <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i><span>Danh sách</span>', array('controller' => 'fields', 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
                    <li><a href="<?php echo SUB_DIR;?>/admin/fields/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Chuyên đề</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                      <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i><span>Danh sách</span>', array('controller' => 'chapters', 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
                    <li><a href="<?php echo SUB_DIR;?>/admin/chapters/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Người dùng</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Danh sách</span>', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Thêm người dùng</span>', array('controller' => 'users', 'action' => 'add', 'admin' => true), array('escape' => false)); ?></li>
                   <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Thêm nhóm</span>', array('controller' => 'groups', 'action' => 'add', 'admin' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Danh sách nhóm</span>', array('plugin'=>'acl_manager','controller' => 'groups', 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Cập nhật AROS</span>', array('plugin'=>'acl_manager','controller' => 'acl', 'action' => 'update_aros', 'admin' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Cập nhật ACOS</span>', array('plugin'=>'acl_manager','controller' => 'acl', 'action' => 'update_acos', 'admin' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Xóa ACOS/AROS</span>', array('plugin'=>'acl_manager','controller' => 'acl', 'action' => 'drop', 'admin' => true), array('escape' => false)); ?></li>
                     <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Phân quyền</span>', array('plugin'=>'acl_manager','controller' => 'acl', 'action' => 'permissions', 'admin' => true), array('escape' => false)); ?></li>
                      <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Xóa phân quyền</span>', array('plugin'=>'acl_manager','controller' => 'acl', 'action' => 'drop_perms', 'admin' => true), array('escape' => false)); ?></li>
                </ul>
            </li>

            
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Đơn vị</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('admin' => true, 'controller' => 'departments', 'action' => 'index'), array('escape' => false)); ?>
                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('admin' => true, 'controller' => 'departments', 'action' => 'add'), array('escape' => false)); ?>
                    </li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i> <span>Thống kê</span>
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
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
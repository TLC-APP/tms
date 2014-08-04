<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <form action="<?php echo SUB_DIR;?>/admin/users/search" method="post" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Nhập tên người dùng cần tìm..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
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
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Thêm mới</span>', array('controller' => 'courses','plugin'=>false, 'action' => 'add', 'admin' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Đang đăng kí</span>', array('controller' => 'courses','plugin'=>false, 'action' => 'index', 'admin' => true, COURSE_REGISTERING), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Chưa hoàn thành</span>', array('controller' => 'courses','plugin'=>false, 'action' => 'index', 'admin' => true, COURSE_UNCOMPLETED), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Đã hoàn thành</span>', array('controller' => 'courses','plugin'=>false, 'action' => 'index', 'admin' => true, COURSE_COMPLETED), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Đã hủy</span>', array('controller' => 'courses','plugin'=>false, 'action' => 'index', 'admin' => true, COURSE_CANCELLED), array('escape' => false)); ?></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Lĩnh vực</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                     <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i><span>Danh sách</span>', array('controller' => 'fields','plugin'=>false, 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
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
                      <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i><span>Danh sách</span>', array('controller' => 'chapters','plugin'=>false, 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
                    <li><a href="<?php echo SUB_DIR;?>/admin/chapters/add"><i class="fa fa-angle-double-right"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Phòng học</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array( 'controller' => 'rooms', 'action' => 'index'), array('escape' => false)); ?>
                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array( 'controller' => 'rooms', 'action' => 'add'), array('escape' => false)); ?>
                    </li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Thông báo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
               

                    <li>
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array( 'controller' => 'messages', 'action' => 'index'), array('escape' => false)); ?>

                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array( 'controller' => 'messages', 'action' => 'add'), array('escape' => false)); ?>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Người dùng</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Danh sách</span>', array('plugin'=>false,'controller' => 'users', 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Thêm người dùng</span>', array('plugin'=>false,'controller' => 'users', 'action' => 'add', 'admin' => true), array('escape' => false)); ?></li>
                   <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Thêm nhóm</span>', array('plugin'=>false,'controller' => 'groups', 'action' => 'add', 'admin' => true), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> <span>Danh sách nhóm</span>', array('plugin'=>false,'controller' => 'groups', 'action' => 'index', 'admin' => true), array('escape' => false)); ?></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Phân quyền</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
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
                    
                    <li><a href="<?php echo SUB_DIR;?>/admin/courses/thong_ke"><i class="fa fa-angle-double-right"></i> Khóa học</a></li>
                    <li><a href="<?php echo SUB_DIR;?>/admin/attends/thong_ke_student"><i class="fa fa-angle-double-right"></i> Người tham dự</a></li>
                
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
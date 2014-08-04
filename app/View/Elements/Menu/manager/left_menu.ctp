<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- search form -->
        
        <form action="<?php echo SUB_DIR;?>/manager/users/search" method="post" class="sidebar-form">
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
            <li>
                <?php //echo $this->Html->link('<i class="fa fa-dashboard"></i> <span>Bàn làm việc</span>', array('manager' => true, 'controller' => 'dashboards', 'action' => 'home'), array('escape' => false));
                ?>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Khóa học</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <?php
                        echo $this->Html->link('<i class="fa fa-angle-double-right"></i> Thêm mới', array('manager' => true, 'controller' => 'courses', 'action' => 'add'), array('escape' => false));
                        ?>
                    </li>
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
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'fields', 'action' => 'index'), array('escape' => false)); ?>
                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'fields', 'action' => 'add'), array('escape' => false)); ?>
                    </li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Chuyên đề</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'chapters', 'action' => 'index'), array('escape' => false)); ?>
                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'chapters', 'action' => 'add'), array('escape' => false)); ?>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Đơn vị</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'departments', 'action' => 'index'), array('escape' => false)); ?>
                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'departments', 'action' => 'add'), array('escape' => false)); ?>
                    </li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Phòng học</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'rooms', 'action' => 'index'), array('escape' => false)); ?>
                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'rooms', 'action' => 'add'), array('escape' => false)); ?>
                    </li>

                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Người dùng</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">                    
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'users','action'=>'index'), array('escape' => false)); ?>
                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'users', 'action' => 'add'), array('escape' => false)); ?>
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
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'messages', 'action' => 'index'), array('escape' => false)); ?>

                    </li>
                    <li>                    
                        <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'messages', 'action' => 'add'), array('escape' => false)); ?>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sign-in"></i> <span>Thống kê</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo SUB_DIR;?>/manager/courses/thong_ke"><i class="fa fa-angle-double-right"></i> Khóa học</a></li>
                    <li><a href="<?php echo SUB_DIR;?>/manager/attends/thong_ke_student"><i class="fa fa-angle-double-right"></i> Người tham dự</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<nav class="main-nav" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button><!--//nav-toggle-->
        </div><!--//navbar-header-->            
        <div class="navbar-collapse collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class=" nav-item">
                    <?php echo $this->Html->link('Trang chủ', array('controller' => 'dashboards', 'action' => 'teacher_home')); ?>
                </li>
                <li class=" nav-item">
                    <?php echo $this->Html->link('Khóa học sắp tổ chức', array('controller' => 'courses_rooms', 'action' => 'sap_to_chuc')); ?>
                </li>

                <li class=" nav-item">
                    <?php echo $this->Html->link('Khóa học đã tập huấn', array('controller' => 'courses_rooms', 'action' => 'da_tap_huan')); ?>
                </li>

            </ul><!--//nav-->
        </div><!--//navabr-collapse-->
    </div><!--//container-->
</nav>
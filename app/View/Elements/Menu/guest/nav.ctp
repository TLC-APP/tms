<nav class="main-nav" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>          
        <div class="navbar-collapse collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class=" nav-item">
                    <?php echo $this->Html->link('Trang chủ',array('controller' => 'dashboards', 'action' => 'home')); ?>
                </li>
                <li class=" nav-item">
                    <?php echo $this->Html->link('Khóa học đã hoàn thành', array('controller' => 'dashboards', 'action' => 'courses_completed')); ?>
                </li>
                <li class=" nav-item">
                    <?php echo $this->Html->link('Hướng dẫn sử dụng', array('controller' => 'dashboards', 'action' => 'help')); ?>
                <li class=" nav-item">
                    <?php echo $this->Html->link('Liên hệ', array('controller' => 'dashboards', 'action' => 'contact')); ?>
            </ul>
        </div>
    </div>
</nav>

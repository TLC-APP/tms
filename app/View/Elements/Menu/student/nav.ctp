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
                <li class="nav-item">
                    <?php echo $this->Html->link('Trang chủ', array('controller' => 'dashboards', 'action' => 'student_home')); ?>
                   </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Khóa học đang tham dự', array('controller' => 'attends', 'action' => 'courses_studying')); ?>
                </li>
                <li class="nav-item">
                     <?php echo $this->Html->link('Khóa học đã tham dự', array('controller' => 'attends', 'action' => 'attended')); ?>
                  
                </li>
            </ul>
        </div>
    </div>
</nav>
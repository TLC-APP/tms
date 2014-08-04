<div class="col-md-8">
    <!-- WIDGET Lịch học hôm nay của tôi-->
    <?php
    $courses_today = $this->requestAction(array('student' => true, 'controller' => 'courses_rooms', 'action' => 'student_lich_homnay'));
    ?>
    <?php echo $this->element('Widgets/student/today_schedule', array('courses_today' => $courses_today)) ?>
    <!-- WIDGET Lớp tập huấn có thể đăng ký-->
    <?php 
    //debug($courses);
    echo $this->element('Common/new_course', array('courses' => $courses)) ?>
</div>
<div class="col-md-4">
    <div class="row">
        <!--Khoa hoc moi dang ky-->
        <?php
        $courses_register = $this->requestAction(array('student' => true, 'controller' => 'courses', 'action' => 'student_khoamoidangki'));
        //debug($courses_register);
        ?>
        <?php echo $this->element('Widgets/student/news', array('courses_register' => $courses_register)); ?>
        <!--WIDGET Thông báo chứng nhận-->
        <?php
        $courses_notification = $this->requestAction(array('student' => true, 'controller' => 'attends', 'action' => 'student_thongbao'));
        ?>
        <?php echo $this->element('Widgets/student/statistics', array('courses_notification' => $courses_notification)) ?>

        <!--WIDGET Thông báo từ hệ thống-->
        <?php echo $this->element('Widgets/student/notification') ?>
    </div>
</div>
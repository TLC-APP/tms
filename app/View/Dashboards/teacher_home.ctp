<div class="col-md-8">
    <!-- WIDGET Lịch tập huấn hôm nay-->
    <?php 
        $teacher_courses_today = $this->requestAction(array('teacher' => true, 'controller' => 'courses_rooms', 'action' => 'teacher_lich_homnay'));
        
    ?>
    <?php echo $this->element('Widgets/teacher/teach_today_schedule',array('teacher_courses_today'=>$teacher_courses_today)) ?>
    
    <!-- WIDGET CÁC lớp tập huấn đang đăng kí của tôi-->
    <?php $courses_organize = $this->requestAction(array('teacher' => true, 'controller' => 'courses', 'action' => 'teacher_courses'));
     ?>
     <?php echo $this->element('Widgets/teacher/class_organize',array('courses_organize'=>$courses_organize)) ?>
</div>

<div class="col-md-4">
    <div class="row">
    <!-- tin tức thông báo-->
    <?php echo $this->element('Widgets/teacher/new_notification') ?>
     <!--Thống kê-->
    <?php echo $this->element('Widgets/teacher/teacher_statistic') ?>
    </div>
</div>
<div class="news-wrapper col-md-8 col-sm-7">
    <!-- WIDGET CÁC KHÓA HỌC CÓ THỂ ĐĂNG KÝ-->
    <?php $courses = $this->requestAction(array('guest' => true, 'controller' => 'courses', 'action' => 'cothedangki')) ?>
    <?php
    if (!empty($courses)) {
        echo $this->element('Widgets/guest/registering_courses', array('courses' => $courses));
    }
    ?>

    <!-- WIDGET Thời khóa biểu hôm nay-->
<?php $courses_today = $this->requestAction(array('guest' => true, 'controller' => 'courses_rooms', 'action' => 'guest_lich_homnay')) ?>
<?php echo $this->element('Widgets/guest/today_schedule', array('courses_today' => $courses_today)); ?>
</div>
<div class="col-md-4">
    <!--WIDGET TIN TỨC - THÔNG BÁO-->
    <?php echo $this->element('Widgets/guest/news'); ?>
    <!--WIDGET LOGIN-->
    <?php
    if (!AuthComponent::user('id'))
        echo $this->element('Widgets/guest/login');
    else {
        echo $this->element('Common/loggedInMenu');
    }
    ?>
</div><!--//col-md-3-->

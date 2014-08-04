<div class="col-md-8">

    <!-- WIDGET CÁC KHÓA HỌC CÓ THỂ ĐĂNG KÝ-->
    <?php echo $this->element('Widgets/guest/registering_courses',array('courses'=>$courses)); ?>

    <!-- WIDGET Thời khóa biểu hôm nay-->
    <?php echo $this->element('Widgets/guest/today_schedule'); ?>



</div>
<div class="col-md-4">
    <!--WIDGET TIN TỨC - THÔNG BÁO-->
    <?php echo $this->element('Widgets/guest/news'); ?>
    <!--WIDGET LOGIN-->
    <?php if (!AuthComponent::user('id')) 
        echo $this->element('Widgets/guest/login'); 
    else{
        echo $this->element('Common/loggedInMenu'); 
    }
    ?>



</div><!--//col-md-3-->
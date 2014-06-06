<meta charset="UTF-8">
<title>Hệ thống quản lý Thông tin Tập huấn Giáo viên | Trang phục vụ quản lý lĩnh vực</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<?php echo $this->Html->css('bootstrap'); ?>
<!-- font Awesome -->
<?php echo $this->Html->css('font-awesome.min'); ?>
<!-- Ionicons -->
<?php //echo $this->Html->css('ionicons.min'); ?>
<!-- Morris chart -->
<?php //echo $this->Html->css('ionicons.min'); ?>
<!-- jvectormap -->
<?php echo $this->Html->css('jvectormap/jquery-jvectormap-1.2.2'); ?>
<!-- fullCalendar -->
<?php echo $this->Html->css('fullcalendar/fullcalendar'); ?>
<!-- Daterange picker -->
<?php echo $this->Html->css('daterangepicker/daterangepicker-bs3'); ?>
<!-- bootstrap wysihtml5 - text editor -->
<?php //echo $this->Html->css('bootstrap-wysihtml5/bootstrap3-wysihtml5.min'); ?>
<!-- Theme style -->
<?php echo $this->Html->css('AdminLTE'); ?>

<!-- add new calendar event modal -->


<!-- jQuery 2.0.2 -->
<?php //echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js') ?>
<?php echo $this->Html->script('jquery') ?>
<!-- jQuery UI 1.10.3 -->
<?php echo $this->Html->script('jquery-ui-1.10.3.min') ?>
<!-- Bootstrap -->
<?php echo $this->Html->script('bootstrap.min') ?>
<!-- Morris.js charts -->
<?php echo $this->Html->script('http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') ?>
<?php echo $this->Html->script('plugins/morris/morris.min') ?>
<!-- Sparkline -->
<?php echo $this->Html->script('plugins/sparkline/jquery.sparkline.min') ?>
<!-- jvectormap -->
<?php echo $this->Html->script('plugins/jvectormap/jquery-jvectormap-1.2.2.min') ?>
<?php echo $this->Html->script('plugins/jvectormap/jquery-jvectormap-world-mill-en') ?>
<!-- fullCalendar -->
<?php echo $this->Html->script('plugins/fullcalendar/fullcalendar.min') ?>
<!-- jQuery Knob Chart -->
<?php echo $this->Html->script('plugins/jqueryKnob/jquery.knob') ?>
<!-- daterangepicker -->
<?php echo $this->Html->script('plugins/daterangepicker/daterangepicker') ?>
<!-- Bootstrap WYSIHTML5 -->
<?php echo $this->Html->script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min') ?>
<!-- iCheck -->
<?php echo $this->Html->script('plugins/iCheck/icheck.min') ?>
<!-- AdminLTE App -->
<?php echo $this->Html->script('AdminLTE/app') ?>

<?php
//echo $this->Html->script('eldarion-ajax.min'); 
echo $this->element('Common/fancybox');
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
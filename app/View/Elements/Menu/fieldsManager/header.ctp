<meta charset="UTF-8">
<title>Hệ thống quản lý Thông tin Tập huấn Giáo viên | Trang phục vụ quản lý lĩnh vực</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<?php echo $this->Html->css('bootstrap'); ?>
<!-- font Awesome -->
<?php echo $this->Html->css('font-awesome.min'); ?>

<!-- fullCalendar -->
<?php echo $this->Html->css('fullcalendar/fullcalendar'); ?>
<!-- Theme style -->
<?php echo $this->Html->css('select2'); ?>
<?php echo $this->Html->css('select2-bootstrap'); ?>
<?php echo $this->Html->css('AdminLTE'); ?>
<!-- jQuery 2.0.2 -->

<?php echo $this->Html->script('jquery') ?>
<?php echo $this->Html->script('jquery-migrate-1.2.1') ?>

<!-- jQuery UI 1.10.3 -->
<?php echo $this->Html->script('jquery-ui-1.10.3.min') ?>
<!-- Bootstrap -->
<?php echo $this->Html->script('bootstrap.min') ?>
<!-- fullCalendar -->
<?php echo $this->Html->script('plugins/fullcalendar/fullcalendar.min') ?>

<!-- AdminLTE App -->
<?php echo $this->Html->script('AdminLTE/app') ?>
<?php echo $this->Html->script('plugins/select2/select2'); ?>
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
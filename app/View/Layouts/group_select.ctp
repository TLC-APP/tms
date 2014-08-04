<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hệ thống quản lý Thông tin Tập huấn Giáo viên | Trang phục vụ quản lý lĩnh vực</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <!-- font Awesome -->
        <?php echo $this->Html->css('font-awesome.min'); ?>
        <!-- Ionicons -->
        <?php echo $this->Html->css('ionicons.min'); ?>
        <!-- Morris chart -->
        <?php echo $this->Html->css('ionicons.min'); ?>
        <!-- jvectormap -->
        <?php echo $this->Html->css('jvectormap/jquery-jvectormap-1.2.2'); ?>
        <!-- fullCalendar -->
        <?php echo $this->Html->css('fullcalendar/fullcalendar'); ?>
        <!-- Daterange picker -->
        <?php echo $this->Html->css('daterangepicker/daterangepicker-bs3'); ?>
        <!-- bootstrap wysihtml5 - text editor -->
        <?php echo $this->Html->css('bootstrap-wysihtml5/bootstrap3-wysihtml5.min'); ?>
        <!-- Theme style -->
        <?php echo $this->Html->css('AdminLTE'); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                TLC.tms
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <?php echo $this->element('Menu/fieldsManager/top_right_nav'); ?>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php //echo $this->element('Menu/fieldsManager/left_nav'); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <?php echo $this->Session->flash(); ?>

                        <?php echo $this->fetch('content'); ?>
                    </div>
                    <!-- Small boxes (Stat box) -->

                    <!-- top row -->

                    <!-- /.row -->

                    <!-- Main row -->


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js') ?>
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
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <?php echo $this->Html->script('AdminLTE/dashboard') ?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->element('Menu/fieldsManager/header'); ?>
    </head>
    <body class="skin-black fixed">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <?php echo $this->Html->link('TMS', array('controller' => 'dashboards', 'action' => 'home', 'fields_manager' => false), array('class' => 'logo')); ?>

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
            <?php echo $this->element('Menu/fieldsManager/left_nav'); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">    
                    <?php echo $this->Html->getCrumbs(' > '); ?>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <?php echo $this->Session->flash(); ?>

                        <?php echo $this->fetch('content'); ?>
                    </div>


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?php echo $this->Js->writeBuffer(); ?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->element('Menu/manager/header'); ?>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php echo $this->element('Menu/manager/top_menu'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $this->element('Menu/manager/left_menu'); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    
                    <ol class="breadcrumb">
                        <?php echo $this->Html->getCrumbs(' > '); ?>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
    </body>
</html>
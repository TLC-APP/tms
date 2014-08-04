<!DOCTYPE html>
<html>
    <?php echo $this->element('Common/admin_head_tag', array('cache' => true)); ?>
    <body class="skin-black fixed">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <?php echo $this->element('Menu/admin/header', array('cache' => true)); ?>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $this->element('Menu/admin/left_nav', array('cache' => true)); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    
                    <ol class="breadcrumb">
                        <?php echo $this->Html->getCrumbs(' > '); ?>
                    </ol>
                </section>
                <section class="content">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                </section>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        
    </body>
</html>
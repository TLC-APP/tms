<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->element('Menu/truongdonvi/header'); ?>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php echo $this->element('Menu/truongdonvi/top_menu'); ?>
        <?php echo $this->fetch('content'); ?>
        
    </body>
</html>
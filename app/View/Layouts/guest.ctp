<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
    <head>
        <?php echo $this->element('Common/header_tag'); ?>

    </head> 

    <body class="home-page">
        <div class="wrapper">
            <!-- ******HEADER****** --> 
            <!--//header-->
            <?php echo $this->element('Menu/guest/header') ?>
            <!-- ******NAV****** -->
            <?php echo $this->element('Menu/guest/nav') ?>
            <!--//main-nav-->

            <!-- ******CONTENT****** --> 
            <div class="content container">
                <div class="row cols-wrapper">

                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Session->flash('auth'); ?>
                    <?php echo $this->fetch('content'); ?> 

                </div><!--//cols-wrapper-->

            </div><!--//content-->

        </div><!--//wrapper-->

        <!-- ******FOOTER****** --> 
        <footer class="footer">

            <div class="bottom-bar">
                <div class="container">
                    <div class="row">
                        <small class="copyright col-md-6 col-sm-12 col-xs-12">Phát triển bởi Trung tâm Hỗ trợ - Phát triển Dạy & Học năm 2014</small>
                        <ul class="social pull-right col-md-6 col-sm-12 col-xs-12">
                            <li><a href="#" ><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" ><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" ><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" ><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" ><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" ><i class="fa fa-skype"></i></a></li> 
                            <li class="row-end"><a href="#" ><i class="fa fa-rss"></i></a></li>
                        </ul><!--//social-->
                    </div><!--//row-->
                </div><!--//container-->
            </div><!--//bottom-bar-->
        </footer><!--//footer-->




    </body>
</html> 


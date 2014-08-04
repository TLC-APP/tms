<header class="header">  

    <div class="header-main container">
        <h1 class="logo col-md-4 col-sm-4">
            <a href="<?php echo SUB_DIR?>/" ><img id="logo" src="<?php echo SUB_DIR?>/user/images/logo.png" 
                              alt="TMS"></a>
        </h1><!--//logo-->           
        <div class="info col-md-8 col-sm-8">
            <ul class="menu-top navbar-right hidden-xs">
                <li class="divider"><a href="#">Xin chào <?php echo AuthComponent::user('name') ?>!</a></li>
                <li class="divider">
                    <?php echo $this->Html->link('Hồ sơ', array('controller' => 'users', 'action' => 'profile', AuthComponent::user('id'))); ?>
                </li>

                <li>
                    <?php echo $this->Html->link('<i class="fa fa-power-off"></i> Thoát', array('controller' => 'users', 'action' => 'logout','student'=>false),array('escape'=>false)); ?>

            </ul><!--//menu-top-->
            <br />

        </div><!--//info-->
    </div><!--//header-main-->
</header>
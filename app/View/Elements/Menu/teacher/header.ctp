<header class="header">  

    <div class="header-main container">
        <h1 class="logo col-md-4 col-sm-4">
            <a href="<?php echo SUB_DIR;?>/" ><img id="logo" src="<?php echo SUB_DIR;?>/user/images/logo.png" 
                                       alt="Logo"></a>
        </h1><!--//logo-->           
        <div class="info col-md-8 col-sm-8">
            <ul class="menu-top navbar-right hidden-xs">
                <li class="divider"><a href="#">Xin chào <?php echo AuthComponent::user('name')?></a></li>
                <li class="divider"><a href="<?php echo SUB_DIR;?>/teacher/users/profile/<?php echo AuthComponent::user('id')?>" >Hồ sơ</a></li>
                <li><a href="<?php echo SUB_DIR;?>/users/logout"><i class="fa fa-power-off"></i> Thoát</a></li>
            </ul><!--//menu-top-->
            <br />

        </div><!--//info-->
    </div><!--//header-main-->
</header>
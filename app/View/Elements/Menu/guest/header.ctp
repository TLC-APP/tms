<header class="header">  
    <div class="header-main container">
        <h1 class="logo col-md-4 col-sm-4">
            <?php
            echo $this->Html->image('/user/images/logo.png', array(
                "alt" => "Hệ thống Quản lý THGV", 'id' => 'logo',
                'url' => array('controller' => 'dashboards', 'action' => 'home')));
            ?>
        </h1><!--//logo-->           
    </div><!--//header-main-->
</header>
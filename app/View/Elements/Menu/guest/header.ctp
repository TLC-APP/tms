<header class="header">  

    <div class="header-main container">
        <h1 class="logo col-md-4 col-sm-4">
                <?php echo $this->Html->link($this->Html->image('/user/images/logo.png'),array('controller' => 'dashboards', 'action' => 'home'), array('escape' => false,'id'=>'logo')); ?>
        </h1><!--//logo-->           
       <?php if(AuthComponent::user('id')):?>
        <div class="info col-md-8 col-sm-8">
            <ul class="menu-top navbar-right hidden-xs">
                <li class="divider"><a href="#">Xin chào <?php echo AuthComponent::user('name') ?>!</a></li>
                <li>
                    <?php echo $this->Html->link('<i class="fa fa-power-off"></i> Thoát', array('controller' => 'users', 'action' => 'logout'),array('escape'=>false)); ?>

            </ul><!--//menu-top-->
            <br />

        </div><!--//info-->
        <?php endif;?>
    </div><!--//header-main-->
</header>



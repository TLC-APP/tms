<ul class="nav navbar-nav">
    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span><?php echo AuthComponent::user('name') ?> <i class="caret"></i></span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header bg-light-blue">
                <img src="<?php echo SUB_DIR;?>/files/user/avatar/<?php echo AuthComponent::user('avatar_path') . '/' . AuthComponent::user('avatar') ?>" class="img-circle" alt="" />
                <p>
                    <?php echo AuthComponent::user('name') ?> - <?php echo AuthComponent::user('email') ?>
                </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <?php echo $this->Html->link('Hồ sơ', array('fields_manager'=>true,'controller' => 'users', 'action' => 'profile',  AuthComponent::user('id')), array('class' => 'btn btn-default btn-flat')); ?>
                </div>
                <div class="pull-right">                    
                    <?php echo $this->Html->link('Thoát', array('fields_manager'=>false,'controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-default btn-flat')); ?>

                </div>
            </li>
        </ul>
    </li>
</ul>

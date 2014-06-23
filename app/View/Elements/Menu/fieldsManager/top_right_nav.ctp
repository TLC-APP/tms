<ul class="nav navbar-nav">
    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span><?php echo AuthComponent::user('name')?> <i class="caret"></i></span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header bg-light-blue">
               <img src="/files/user/avatar/<?php echo AuthComponent::user('avatar_path').'/'.AuthComponent::user('avatar')?>" class="img-circle" alt="" />
                <p>
                    <?php echo AuthComponent::user('name')?> - <?php echo AuthComponent::user('email')?>
                </p>
            </li>
            
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a class="btn btn-info" href="/fields_manager/users/profile/<?php echo AuthComponent::user('id')?>" >Hồ sơ</a>
                </div>
                <div class="pull-right">
                    <a href="/users/logout" class="btn btn-info">Thoát</a>
                </div>
            </li>
        </ul>
    </li>
</ul>
<div class="jobs-wrapper col-md-10 col-sm-7">           
    <h3 class="title" style="font-family: arial">Thông tin <?php echo $user['User']['name'] ?></h3>
    <div class="box box-border page-row">
        <?php if ($user['User']['avatar']) { ?>
            <li>        
                <div class="img-responsive">   
                    <?php echo $this->Html->image("/files/user/avatar/" . $user['User']['avatar_path'] . '/' . $user['User']['avatar'], array('width' => 200)); ?>
                </div>
            </li>
        <?php } ?>

        <li><strong>Họ tên:</strong> <?php echo $user['User']['name'] ?></li>

        <?php if ($user['Department']['name']) { ?>
            <li><strong>Đơn vị:</strong> <?php echo $user['Department']['name'] ?></li>
        <?php } ?>

        <?php if ($user['User']['phone_number']) { ?>
            <li><strong>Số điện thoại:</strong> <?php echo $user['User']['phone_number'] ?></li>
        <?php } ?>

        <?php if ($user['User']['email']) { ?>
            <li><strong>Email:</strong> <?php echo $user['User']['email'] ?></li>
        <?php } ?>

        <?php if ($user['User']['birthday']) { ?>  
            <li><strong>Ngày sinh:</strong> <?php echo $user['User']['birthday'] ?></li>
        <?php } ?>

        <?php if ($user['User']['birthplace']) { ?>  
            <li><strong>Nơi sinh:</strong> <?php echo $user['User']['birthplace'] ?></li>
        <?php } ?>

        <?php if ($user['User']['address']) { ?>
            <li><strong>Địa chỉ:</strong> <?php echo $user['User']['address'] ?></li>
        <?php } ?>
        </ul>                                
    </div>
    <br>
    <div class="box-footer">
        <div class="box-tools">
            <?php echo $this->Html->link('Sửa', array('student' => true, 'controller' => 'users', 'action' => 'edit_profile', $user['User']['id']), array('class' => 'btn btn-info')); ?>
        </div>
    </div>
    <br>
</div>
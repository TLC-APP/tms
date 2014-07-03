<div class="jobs-wrapper col-md-10 col-sm-7">           
    <h3 class="title" style="font-family: arial">Thông tin <?php echo $user['User']['name'] ?></h3>

    <div class="box box-border page-row">
        <ul class="list-unstyled">
            <li> 
                <?php if ($user['User']['avatar']) { ?>
                    <div class="img-responsive">   
                        <?php echo $this->Html->image("/files/user/avatar/" . $user['User']['avatar_path'] . '/' . $user['User']['avatar'], array('width' => 200)); ?>
                    </div>
                <?php } ?>
            </li>
            <li><strong>Họ tên:</strong> <?php echo $user['User']['name'] ?></li>
            <li><strong>Đơn vị:</strong> <?php echo $user['Department']['name'] ?></li>
            <li><strong>Số điện thoại:</strong> College Green</li>
            <li><strong>Học hàm:</strong> <?php echo $user['HocHam']['name'] ?></li>
            <li><strong>Học vị:</strong> <?php echo $user['HocVi']['name'] ?></li>

            <li><strong>Email:</strong> <?php echo $user['User']['email'] ?></li>
            <li><strong>Ngày sinh:</strong> <?php $ngaysinh = new DateTime($user['User']['birthday']);
                echo $ngaysinh->format('d/m/Y'); ?></li>
            <li><strong>Nơi sinh:</strong> <?php echo $user['User']['birthplace'] ?></li>
            <li><strong>Địa chỉ:</strong> <?php echo $user['User']['address'] ?></li>
        </ul>                                
    </div>
    <div class="box-footer">
        <div class="box-tools">
<?php echo $this->Html->link('Sửa', array('fields_manager' => true, 'controller' => 'users', 'action' => 'edit_profile', $user['User']['id']), array('class' => 'btn btn-info')); ?>
        </div>
    </div>
    <br>
</div>
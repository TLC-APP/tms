<div class="container" style="margin-top: 50px;">
    <?php
    $this->Html->addCrumb('User', '/manager/teachers');
    $this->Html->addCrumb('Thêm người dùng mới');
    ?>
    <?php
    echo $this->Form->create('User', array(
        'type' => 'file',
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => array(
                'class' => 'col col-sm-2 control-label'
            ),
            'wrapInput' => 'col col-sm-6',
            'class' => 'form-control'
        ),
        'class' => 'well form-horizontal', 'id' => 'addTeacher'
    ));
    ?>
    <fieldset>
        <legend>Thêm người dùng mới</legend>
        <?php
        echo $this->Form->input('name', array('label' => 'Họ tên'));
        echo $this->Form->input('Group', array('label' => 'Nhóm'));
        echo $this->Form->input('activated', array('label' => 'Kích hoạt', 'type' => 'checkbox'));

        echo $this->Form->input('hoc_ham_id', array('label' => 'Học hàm', 'empty' => '-- Chọn học hàm --',
            'after' => $this->Html->link('<span class="glyphicon glyphicon-plus"></span>Thêm mới', '/hoc_hams/add', array('escape' => false,
                'class' => 'add-button btn btn-primary fancybox.ajax', 'role' => 'button', 'div' => false))));
        echo $this->Form->input('hoc_vi_id', array('label' => 'Học vị', 'after' => $this->Html->link('<span class="glyphicon glyphicon-plus"></span>Thêm mới', '/hoc_vis/add', array('escape' => false, 'class' => 'add-button btn btn-primary fancybox.ajax', 'role' => 'button', 'div' => false))));
        echo $this->Form->input('email');
        echo $this->Form->input('department_id', array('label' => 'Đơn vị', 'empty' => '-- Chọn đơn vị --',
            'after' => $this->Html->link('<span class="glyphicon glyphicon-plus"></span>Thêm mới', '/departments/add', array('escape' => false,
                'class' => 'add-button btn btn-primary fancybox.ajax', 'role' => 'button', 'div' => false))));
        echo $this->Form->input('birthday', array('class' => false, 'label' => 'Ngày sinh ', 'dateFormat' => 'DMY', 'monthNames' => false, 'minYear' => '1950'));
        echo $this->Form->input('birthplace', array('label' => 'Nơi sinh'));
        echo $this->Form->input('phone_number', array('label' => 'Số điện thoại'));
        echo $this->Form->input('address', array('label' => 'Địa chỉ'));
        echo $this->Form->input('avatar', array('type' => 'file', 'class' => false, 'label' => 'Ảnh'));
        echo $this->Form->input('avatar_path', array('type' => 'hidden'));
        echo $this->Form->input('username');
        echo $this->Form->input('password', array('label' => 'Mật khẩu', 'type' => 'password'));
        echo $this->Form->input('cpassword', array('label' => 'Nhập lại mật khẩu', 'type' => 'password'));
        ?>
    </fieldset>
    <div class="btn-toolbar" style="text-align: center;">
        <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>
        <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
        <?php echo $this->Form->end(); ?>
    </div>

</div>
<script>
    $(document).ready(function() {
        $("#UserDepartmentId").select2();

    });
</script>
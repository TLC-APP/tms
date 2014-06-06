<div class="col-lg-10 well">
    <?php
    echo $this->Form->create('User', array(
        'type' => 'file',
        'inputDefaults' => array(
            'div' => 'form-group',
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'class' => 'well'
    ));
    ?>
    <fieldset>
        <legend>Cập nhật thông tin cá nhân</legend>
        <?php
        echo $this->Form->input('name', array('label' => 'Họ tên'));
        echo $this->Form->input('department_id', array('label' => 'Đơn vị','empty'=>'-- chọn đơn vị --'));
        echo $this->Form->input('email');
        echo $this->Form->input('birthday', array('label' => 'Ngày sinh', 'class' => 'input datetime', 'dateFormat' => 'DMY', 'monthNames' => false, 'minYear' => 1950));
        echo $this->Form->input('birthplace', array('label' => 'Nơi sinh'));
        echo $this->Form->input('phone_number', array('label' => 'Số điện thoại'));
        echo $this->Form->input('address', array('label' => 'Địa chỉ'));
        echo $this->Form->input('avatar', array('label' => 'Ảnh đại diện', 'type' => 'file'));
        echo $this->Form->input('avatar_path', array('type' => 'hidden'));
        echo $this->Form->input('id');
        ?>
    </fieldset>
    <?php echo $this->Form->end('Lưu'); ?>
</div>
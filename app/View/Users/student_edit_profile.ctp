<?php echo $this->Html->css('select2'); ?>
<?php echo $this->Html->css('select2-bootstrap'); ?>
<?php echo $this->Html->script('plugins/select2/select2'); ?>
<div class="container">
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
        echo $this->Form->input('department_id', array('id' => 'UserDepartmentId', 'label' => 'Đơn vị', 'empty' => '-- chọn đơn vị --', 'required' => true, 'after' => $this->Html->link('<span class="glyphicon glyphicon-plus"></span>', array('action' => 'add', 'controller' => 'departments', 'fields_manager' => false), array('escape' => false,
                'class' => 'add-button btn btn-primary fancybox.ajax', 'role' => 'button', 'div' => false))));
        echo $this->Form->input('sex',array('label'=>'Giới tính','type'=>'select','options'=>array('0'=>'Nữ','1'=>'Nam')));
        
        echo $this->Form->input('hoc_ham_id', array('label' => 'Học hàm', 'empty' => '-- Chọn học hàm --',
            'after' => $this->Html->link('<span class="glyphicon glyphicon-plus"></span>', array('controller'=>'hoc_hams','action'=>'add','student'=>false), array('escape' => false,
                'class' => 'add-button btn btn-primary fancybox.ajax', 'role' => 'button', 'div' => false))));
        echo $this->Form->input('hoc_vi_id', array('label' => 'Học vị', 'after' => $this->Html->link('<span class="glyphicon glyphicon-plus"></span>', '/hocvis/add', array('escape' => false, 'class' => 'add-button btn btn-primary fancybox.ajax', 'role' => 'button', 'div' => false))));
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
    <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-info')) ?>
    <?php echo $this->Form->end(); ?>
</div>
<script>
    $(document).ready(function() {
        $("#UserDepartmentId").select2();

    });
</script>
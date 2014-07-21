<div class="container">
    <?php
    $this->Html->addCrumb('Người dùng ', '/manager/teachers');
    $this->Html->addCrumb('Cập nhật user> ' . $this->Form->value('User.name'));
    ?>
    <?php
    echo $this->Form->create('User', array(
        'type' => 'file',
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => array(
                'class' => 'col col-sm-3 control-label'
            ),
            'wrapInput' => 'col col-sm-7',
            'class' => 'form-control'
        ),
        'class' => 'well form-horizontal'
    ));
    ?>
    <fieldset>
        <legend>Cập nhật người dùng</legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name', array('label' => 'Họ tên'));
        echo $this->Form->input('department_id', array('id' => 'UserDepartmentId', 'label' => 'Đơn vị', 'empty' => '-- chọn đơn vị --', 'required' => true, 'after' => $this->Html->link('<span class="glyphicon glyphicon-plus"></span>', array('action' => 'add', 'controller' => 'departments', 'fields_manager' => false), array('escape' => false,
                'class' => 'add-button btn btn-primary fancybox.ajax', 'role' => 'button', 'div' => false))));
        echo $this->Form->input('Group', array('label' => 'Nhóm'));
        ?>
        <?php
        echo $this->Form->input('activated', array('label' => 'Kích hoạt', 'type' => 'checkbox','class'=>'checkbox'));
        echo $this->Form->input('hoc_ham_id', array('label' => 'Học hàm', 'empty' => '-- Chọn học hàm --',
            'after' => $this->Html->link('<span class="glyphicon glyphicon-plus"></span>Thêm mới', '/hoc_hams/add', array('escape' => false,
                'class' => 'add-button btn btn-primary fancybox.ajax', 'role' => 'button', 'div' => false))));
        echo $this->Form->input('hoc_vi_id', array('label' => 'Học vị', 'after' => $this->Html->link('<span class="glyphicon glyphicon-plus"></span>Thêm mới', '/hoc_vis/add', array('escape' => false, 'class' => 'add-button btn btn-primary fancybox.ajax', 'role' => 'button', 'div' => false))));
        echo $this->Form->input('email');
        echo $this->Form->input('birthday', array('class' => false, 'label' => 'Ngày sinh ', 'dateFormat' => 'DMY', 'monthNames' => false, 'minYear' => '1950'));
        echo $this->Form->input('birthplace', array('label' => 'Nơi sinh'));
        echo $this->Form->input('phone_number', array('label' => 'Số điện thoại'));
        echo $this->Form->input('address', array('label' => 'Địa chỉ'));
        echo $this->Form->input('avatar', array('type' => 'file', 'class' => false, 'label' => 'Ảnh'));
        echo $this->Form->input('avatar_path', array('type' => 'hidden'));
        ?>
    </fieldset>
    <div class="btn-toolbar" style="text-align: center;">
        <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
        <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>
        
        <?php echo $this->Form->end(); ?>
    </div>
   

</div>

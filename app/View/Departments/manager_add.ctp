<div class="well">
    <?php echo $this->Form->create('Department',array('inputDefaults' => array(
            'div' => 'form-group',
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'class' => 'well')); ?>
    <fieldset>
        <legend>Thêm đơn vị</legend>
        <?php
        echo $this->Form->input('name', array('label' => 'Tên'));
        echo $this->Form->input('parent_id', array('label' => 'Đơn vị trên', 'required' => false, 'empty' => '-- chọn đơn vị trên --'));

        echo $this->Form->input('phone_number', array('label' => 'Số nội bộ'));
        echo $this->Form->input('decription', array('label' => 'Miêu tả'));
        ?>
    </fieldset>
    <?php echo $this->Form->end('Lưu'); ?>
</div>


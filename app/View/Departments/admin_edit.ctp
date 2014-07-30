<?php
echo $this->element('Common/tinymce');
$this->Html->addCrumb('Đơn vị', '/departments');
$this->Html->addCrumb('Cập nhật đơn vị');
?>
<div class="col-md-12">
    <?php
    echo $this->Form->create('Department', array(
        'type' => 'file',
        'inputDefaults' => array(
            'div' => 'form-group',
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'class' => 'well'
            )
    );
    ?>
    <fieldset>
        <legend>Cập nhật đơn vị</legend>
        <?php
        echo $this->Form->input('name', array('label' => 'Tên'));
        echo $this->Form->input('parent_id', array('label' => 'Đơn vị trên', 'required' => false, 'empty' => '-- chọn đơn vị trên --'));
        echo $this->Form->input('truong_don_vi_id', array('label' => 'Trưởng đơn vị', 'required' => false, 'empty' => '-- Chọn trưởng đơn vị --'));

        echo $this->Form->input('phone_number', array('label' => 'Số nội bộ'));
        echo $this->Form->input('decription', array('label' => 'Miêu tả'));
        echo $this->Form->input('id');
        ?>
    </fieldset>
    <div class="btn-toolbar" style="text-align: center;">
        <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
        <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-info')) ?>

    </div>
    <?php echo $this->Form->end(); ?>
</div>
<script>
    $(document).ready(function() {
        $("#DepartmentParentId").select2();
        $("#DepartmentTruongDonViId").select2();
    });
</script>

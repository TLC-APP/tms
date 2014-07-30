<?php
echo $this->element('Common/tinymce');
$this->Html->addCrumb('Đơn vị', '/manager/departments');
$this->Html->addCrumb('Thêm đơn vị mới');
?>
<div class="col-lg-10 well">
    <?php
    echo $this->Form->create('Department', array(
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
        <legend>Thêm đơn vị</legend>
        <?php
        echo $this->Form->input('name', array('label' => 'Tên'));
        echo $this->Form->input('parent_id', array('label' => 'Đơn vị trên', 'required' => false, 'empty' => '-- Chọn đơn vị trên --'));
        echo $this->Form->input('truong_don_vi_id', array('label' => 'Trưởng đơn vị', 'required' => false, 'empty' => '-- Chọn trưởng đơn vị --'));
        echo $this->Form->input('phone_number', array('label' => 'Số nội bộ'));
        echo $this->Form->input('decription', array('label' => 'Miêu tả'));
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
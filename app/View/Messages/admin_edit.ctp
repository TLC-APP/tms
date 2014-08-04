<?php
echo $this->element('Common/tinymce');
$this->Html->addCrumb('Thông báo', '/messages');
$this->Html->addCrumb('Cập nhật thông báo');
?>
<div class="col-md-12">
<?php
    echo $this->Form->create('Message', array(
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
<legend><?php echo 'Cập nhật thông báo'; ?></legend>
<?php
         echo $this->Form->input('id');
        echo $this->Form->input('title', array('label' => 'Tiêu đề'));
        echo $this->Form->input('content', array('label' => 'Nội dung','required'=>false));
         echo $this->Form->input('category_id', array('label' => 'Nhóm người nhận'));
        echo $this->Form->input('published', array('label' => 'Trạng thái','type'=>'checkbox'));
        ?>
</fieldset>
<div class="btn-toolbar" style="text-align: center;">
<?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-info')) ?>
<?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
</div>
<?php echo $this->Form->end(); ?>
</div>


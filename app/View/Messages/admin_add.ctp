<?php
echo $this->element('Common/tinymce');
$this->Html->addCrumb('Thông báo', '/manager/messages');
$this->Html->addCrumb('Thêm thông báo mới');
?>
<div class="col-lg-10 well">
    <?php
    echo $this->Form->create('Message', array(
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
        <legend><?php echo 'Thêm thông báo mới'; ?></legend>
        <?php
         echo $this->Form->input('id');
        echo $this->Form->input('title', array('label' => 'Tiêu đề'));
        echo $this->Form->input('content', array('label' => 'Nội dung','required'=>false));
         echo $this->Form->input('category_id', array('label' => 'Nhóm người nhận','empty'=>'-- Chọn nhóm người nhận --'));
        echo $this->Form->input('published', array('label' => 'Trạng thái'));
        ?>
    </fieldset>
    <div class="btn-toolbar" style="text-align: center;">
        <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-info')) ?>
        <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
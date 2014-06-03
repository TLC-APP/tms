<?php
echo $this->element('Common/tinymce');
$this->Html->addCrumb('Chuyên đề', '/chapters');
$this->Html->addCrumb('Thêm chuyên đề mới');
?>
<div class="col-md-12">
    <?php
    echo $this->Form->create('Chapter', array(
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
        <legend>Cập nhật chuyên đề</legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name', array('label' => 'Tên chuyên đề'));
        echo $this->Form->input('field_id', array('label' => 'Lĩnh vực'));
        echo $this->Form->input('decriptions', array('label' => 'Miêu tả'));
        echo $this->Form->input('image', array('label' => 'Ảnh đại diện', 'type' => 'file','class'=>false));
        echo $this->Form->input('image_path', array('type' => 'hidden'));
        ?>
    </fieldset>
    <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>
    <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
    <?php echo $this->Form->end(); ?>
    
</div>

<?php
echo $this->element('Common/tinymce');
$this->Html->addCrumb('Phòng học', '/rooms');
$this->Html->addCrumb('Cập nhật phòng học');
?>
<div class="col-md-12">
    <?php
    echo $this->Form->create('Room', array(
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
        <legend>Cập nhật phòng học</legend>
        <?php
        echo $this->Form->input('name',array('label'=>'Tên phòng học'));
        echo $this->Form->input('decription',array('label'=>'Mô tả'));
        echo $this->Form->input('id');
        ?>
    </fieldset>
    <div class="btn-toolbar" style="text-align: center;">
        <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
        <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-info')) ?>

    </div>
    <?php echo $this->Form->end(); ?>
</div>


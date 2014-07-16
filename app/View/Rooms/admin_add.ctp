<?php
echo $this->element('Common/tinymce');
$this->Html->addCrumb('Phòng học', '/manager/rooms');
$this->Html->addCrumb('Thêm phòng học mới');
?>
<div class="col-md-12">
    <?php
    echo $this->Form->create('Room', array(
        'type' => 'file',
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => array(
                'class' => 'col col-sm-3 control-label'
            ),
            'wrapInput' => 'col col-sm-7',
            'class' => 'form-control'
        ),
        'class' => 'well form-horizontal',
            )
    );
    ?>
    <fieldset>
        <legend>Thêm phòng học mới</legend>
        <?php
        echo $this->Form->input('name',array('label' => 'Tên phòng'));
        echo $this->Form->input('decription',array('label' => 'Miêu tả'));
        ?>
    </fieldset>
    <div class="btn-toolbar" style="text-align: center;">
        <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
        <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>

    </div>
    <?php echo $this->Form->end(); ?>

</div>

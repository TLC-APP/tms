<div class="rooms form">
    <div id='message'></div>
    <?php
    echo $this->Form->create('Room', array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => array(
                'class' => 'col col-sm-3 control-label'
            ),
            'wrapInput' => 'col col-sm-7',
            'class' => 'form-control'
        ),
        'class' => 'well form-horizontal',
        'id' => 'addRoomForm'
    ));
    ?>
    <fieldset>
        <legend>Thêm phòng học</legend>
        <?php
        echo $this->Form->input('name',array('label' => 'Tên phòng'));
        echo $this->Form->input('decription',array('label' => 'Miêu tả'));
        ?>
    </fieldset>
    <div class="btn-toolbar" style="text-align: center;">
    <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>
    <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
    </div>
<?php echo $this->Form->end(); ?>
</div>

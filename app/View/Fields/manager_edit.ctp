<div class="fields form">
    <?php
    echo $this->Form->create('Field', array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'class' => 'well'
    ));
    ?>
    <fieldset>
        <legend>Cập nhật lĩnh vực</legend>
        <?php
        echo $this->Form->input('name', array('label' => 'Tên lĩnh vực'));
        echo $this->Form->input('manage_user_id', array('label' => 'Người quản lý'));
        echo $this->Form->input('decription', array('label' => 'Miêu tả'));
        echo $this->Form->input('certificated_number_suffix',array('label' => 'Đuôi số chứng chỉ'));
        echo $this->Form->input('current_certificate_number',array('label' => 'Chỉ số chứng chỉ hiện tại'));
        echo $this->Form->input('id');
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Lưu')); ?>
</div>

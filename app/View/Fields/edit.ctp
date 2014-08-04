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
        echo $this->Form->input('certificated_number_suffix');
        echo $this->Form->input('id');
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Field.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Field.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Fields'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
    </ul>
</div>

<div class="attachments form">
<?php echo $this->Form->create('Attachment'); ?>
	<fieldset>
		<legend><?php echo __('Add Attachment'); ?></legend>
	<?php
		echo $this->Form->input('model');
		echo $this->Form->input('foreign_key');
		echo $this->Form->input('name');
		echo $this->Form->input('attachment');
		echo $this->Form->input('dir');
		echo $this->Form->input('type');
		echo $this->Form->input('size');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Attachments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Quyet Dinh Kiem Nhiems'), array('controller' => 'quyet_dinh_kiem_nhiems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quyet Dinh Kiem Nhiem'), array('controller' => 'quyet_dinh_kiem_nhiems', 'action' => 'add')); ?> </li>
	</ul>
</div>

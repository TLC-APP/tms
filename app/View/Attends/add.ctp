<div class="Attends form">
<?php echo $this->Form->create('Attend'); ?>
	<fieldset>
		<legend><?php echo __('Add Students Course'); ?></legend>
	<?php
		echo $this->Form->input('student_id');
		echo $this->Form->input('course_id');
		echo $this->Form->input('is_passed');
		echo $this->Form->input('is_recieved');
		echo $this->Form->input('certificated_date');
		echo $this->Form->input('certificated_number');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Students Courses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>

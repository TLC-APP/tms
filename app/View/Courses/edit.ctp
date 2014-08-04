<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Edit Course'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('teacher_id');
		echo $this->Form->input('decription');
		echo $this->Form->input('max_enroll_number');
		echo $this->Form->input('session_number');
		echo $this->Form->input('is_published');
		echo $this->Form->input('is_cancelled');
		echo $this->Form->input('is_master_teaching');
		echo $this->Form->input('is_lock_grade_update');
		echo $this->Form->input('enrolling_expiry_date');
		echo $this->Form->input('grade_update_expiry_date');
		echo $this->Form->input('status');
		echo $this->Form->input('id');
		echo $this->Form->input('chapter_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Course.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Course.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Rooms'), array('controller' => 'courses_rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses Room'), array('controller' => 'courses_rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>

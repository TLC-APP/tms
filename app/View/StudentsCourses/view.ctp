<div class="studentsCourses view">
<h2><?php echo __('Students Course'); ?></h2>
	<dl>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentsCourse['Student']['name'], array('controller' => 'users', 'action' => 'view', $studentsCourse['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentsCourse['Course']['name'], array('controller' => 'courses', 'action' => 'view', $studentsCourse['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Passed'); ?></dt>
		<dd>
			<?php echo h($studentsCourse['StudentsCourse']['is_passed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Recieved'); ?></dt>
		<dd>
			<?php echo h($studentsCourse['StudentsCourse']['is_recieved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certificated Date'); ?></dt>
		<dd>
			<?php echo h($studentsCourse['StudentsCourse']['certificated_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certificated Number'); ?></dt>
		<dd>
			<?php echo h($studentsCourse['StudentsCourse']['certificated_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($studentsCourse['StudentsCourse']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($studentsCourse['StudentsCourse']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($studentsCourse['StudentsCourse']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Students Course'), array('action' => 'edit', $studentsCourse['StudentsCourse']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Students Course'), array('action' => 'delete', $studentsCourse['StudentsCourse']['id']), null, __('Are you sure you want to delete # %s?', $studentsCourse['StudentsCourse']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Students Course'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>

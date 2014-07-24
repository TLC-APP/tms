<div class="attends view">
<h2><?php echo __('Students Course'); ?></h2>
	<dl>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attend['Student']['name'], array('controller' => 'users', 'action' => 'view', $attend['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attend['Course']['name'], array('controller' => 'courses', 'action' => 'view', $attend['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Passed'); ?></dt>
		<dd>
			<?php echo h($attend['Attend']['is_passed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Recieved'); ?></dt>
		<dd>
			<?php echo h($attend['Attend']['is_recieved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certificated Date'); ?></dt>
		<dd>
			<?php echo h($attend['Attend']['certificated_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certificated Number'); ?></dt>
		<dd>
			<?php echo h($attend['Attend']['certificated_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attend['Attend']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($attend['Attend']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attend['Attend']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Students Course'), array('action' => 'edit', $attend['Attend']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Students Course'), array('action' => 'delete', $attend['Attend']['id']), null, __('Are you sure you want to delete # %s?', $attend['Attend']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Students Course'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>

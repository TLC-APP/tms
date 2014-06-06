<div class="coursesRooms view">
<h2><?php echo __('Courses Room'); ?></h2>
	<dl>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesRoom['Course']['name'], array('controller' => 'courses', 'action' => 'view', $coursesRoom['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesRoom['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $coursesRoom['Room']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Begin'); ?></dt>
		<dd>
			<?php echo h($coursesRoom['CoursesRoom']['begin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Priority'); ?></dt>
		<dd>
			<?php echo h($coursesRoom['CoursesRoom']['priority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($coursesRoom['CoursesRoom']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($coursesRoom['CoursesRoom']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User Id'); ?></dt>
		<dd>
			<?php echo h($coursesRoom['CoursesRoom']['created_user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($coursesRoom['CoursesRoom']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coursesRoom['CoursesRoom']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color'); ?></dt>
		<dd>
			<?php echo h($coursesRoom['CoursesRoom']['color']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Courses Room'), array('action' => 'edit', $coursesRoom['CoursesRoom']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Courses Room'), array('action' => 'delete', $coursesRoom['CoursesRoom']['id']), null, __('Are you sure you want to delete # %s?', $coursesRoom['CoursesRoom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Rooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses Room'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>

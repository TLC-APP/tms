<div class="rooms view">
<h2><?php echo __('Room'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($room['Room']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Decription'); ?></dt>
		<dd>
			<?php echo h($room['Room']['decription']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($room['Room']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room'), array('action' => 'edit', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Room'), array('action' => 'delete', $room['Room']['id']), null, __('Are you sure you want to delete # %s?', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Rooms'), array('controller' => 'courses_rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses Room'), array('controller' => 'courses_rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Courses Rooms'); ?></h3>
	<?php if (!empty($room['CoursesRoom'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Room Id'); ?></th>
		<th><?php echo __('Begin'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($room['CoursesRoom'] as $coursesRoom): ?>
		<tr>
			<td><?php echo $coursesRoom['course_id']; ?></td>
			<td><?php echo $coursesRoom['room_id']; ?></td>
			<td><?php echo $coursesRoom['begin']; ?></td>
			<td><?php echo $coursesRoom['note']; ?></td>
			<td><?php echo $coursesRoom['created']; ?></td>
			<td><?php echo $coursesRoom['modified']; ?></td>
			<td><?php echo $coursesRoom['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'courses_rooms', 'action' => 'view', $coursesRoom['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'courses_rooms', 'action' => 'edit', $coursesRoom['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courses_rooms', 'action' => 'delete', $coursesRoom['id']), null, __('Are you sure you want to delete # %s?', $coursesRoom['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Courses Room'), array('controller' => 'courses_rooms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

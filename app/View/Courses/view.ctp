<div class="courses view">
<h2><?php echo __('Course'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Teacher'); ?></dt>
		<dd>
			<?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Decription'); ?></dt>
		<dd>
			<?php echo h($course['Course']['decription']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Enroll Number'); ?></dt>
		<dd>
			<?php echo h($course['Course']['max_enroll_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Session Number'); ?></dt>
		<dd>
			<?php echo h($course['Course']['session_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Published'); ?></dt>
		<dd>
			<?php echo h($course['Course']['is_published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Cancelled'); ?></dt>
		<dd>
			<?php echo h($course['Course']['is_cancelled']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Master Teaching'); ?></dt>
		<dd>
			<?php echo h($course['Course']['is_master_teaching']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Lock Grade Update'); ?></dt>
		<dd>
			<?php echo h($course['Course']['is_lock_grade_update']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enrolling Expiry Date'); ?></dt>
		<dd>
			<?php echo h($course['Course']['enrolling_expiry_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grade Update Expiry Date'); ?></dt>
		<dd>
			<?php echo h($course['Course']['grade_update_expiry_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($course['Course']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($course['Course']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($course['Course']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chapter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Rooms'), array('controller' => 'courses_rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses Room'), array('controller' => 'courses_rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($course['Student'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Birthplace'); ?></th>
		<th><?php echo __('Phone Number'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Avatar'); ?></th>
		<th><?php echo __('Avatar Path'); ?></th>
		<th><?php echo __('Activated'); ?></th>
		<th><?php echo __('Last Login'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($course['Student'] as $student): ?>
		<tr>
			<td><?php echo $student['name']; ?></td>
			<td><?php echo $student['username']; ?></td>
			<td><?php echo $student['password']; ?></td>
			<td><?php echo $student['email']; ?></td>
			<td><?php echo $student['birthday']; ?></td>
			<td><?php echo $student['birthplace']; ?></td>
			<td><?php echo $student['phone_number']; ?></td>
			<td><?php echo $student['address']; ?></td>
			<td><?php echo $student['avatar']; ?></td>
			<td><?php echo $student['avatar_path']; ?></td>
			<td><?php echo $student['activated']; ?></td>
			<td><?php echo $student['last_login']; ?></td>
			<td><?php echo $student['created']; ?></td>
			<td><?php echo $student['modified']; ?></td>
			<td><?php echo $student['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $student['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $student['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $student['id']), null, __('Are you sure you want to delete # %s?', $student['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Courses Rooms'); ?></h3>
	<?php if (!empty($course['CoursesRoom'])): ?>
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
	<?php foreach ($course['CoursesRoom'] as $coursesRoom): ?>
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

<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($user['User']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthplace'); ?></dt>
		<dd>
			<?php echo h($user['User']['birthplace']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($user['User']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avatar'); ?></dt>
		<dd>
			<?php echo h($user['User']['avatar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avatar Path'); ?></dt>
		<dd>
			<?php echo h($user['User']['avatar_path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activated'); ?></dt>
		<dd>
			<?php echo h($user['User']['activated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Login'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teaching Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students Courses'), array('controller' => 'attends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Students Course'), array('controller' => 'attends', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Courses'); ?></h3>
	<?php if (!empty($user['TeachingCourse'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Teacher Id'); ?></th>
		<th><?php echo __('Decription'); ?></th>
		<th><?php echo __('Max Enroll Number'); ?></th>
		<th><?php echo __('Session Number'); ?></th>
		<th><?php echo __('Is Published'); ?></th>
		<th><?php echo __('Is Cancelled'); ?></th>
		<th><?php echo __('Is Master Teaching'); ?></th>
		<th><?php echo __('Is Lock Grade Update'); ?></th>
		<th><?php echo __('Enrolling Expiry Date'); ?></th>
		<th><?php echo __('Grade Update Expiry Date'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Chapter Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['TeachingCourse'] as $teachingCourse): ?>
		<tr>
			<td><?php echo $teachingCourse['name']; ?></td>
			<td><?php echo $teachingCourse['teacher_id']; ?></td>
			<td><?php echo $teachingCourse['decription']; ?></td>
			<td><?php echo $teachingCourse['max_enroll_number']; ?></td>
			<td><?php echo $teachingCourse['session_number']; ?></td>
			<td><?php echo $teachingCourse['is_published']; ?></td>
			<td><?php echo $teachingCourse['is_cancelled']; ?></td>
			<td><?php echo $teachingCourse['is_master_teaching']; ?></td>
			<td><?php echo $teachingCourse['is_lock_grade_update']; ?></td>
			<td><?php echo $teachingCourse['enrolling_expiry_date']; ?></td>
			<td><?php echo $teachingCourse['grade_update_expiry_date']; ?></td>
			<td><?php echo $teachingCourse['status']; ?></td>
			<td><?php echo $teachingCourse['created']; ?></td>
			<td><?php echo $teachingCourse['modified']; ?></td>
			<td><?php echo $teachingCourse['id']; ?></td>
			<td><?php echo $teachingCourse['chapter_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'courses', 'action' => 'view', $teachingCourse['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'courses', 'action' => 'edit', $teachingCourse['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courses', 'action' => 'delete', $teachingCourse['id']), null, __('Are you sure you want to delete # %s?', $teachingCourse['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Teaching Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Students Courses'); ?></h3>
	<?php if (!empty($user['Attend'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Is Passed'); ?></th>
		<th><?php echo __('Is Recieved'); ?></th>
		<th><?php echo __('Certificated Date'); ?></th>
		<th><?php echo __('Certificated Number'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Attend'] as $attend): ?>
		<tr>
			<td><?php echo $attend['student_id']; ?></td>
			<td><?php echo $attend['course_id']; ?></td>
			<td><?php echo $attend['is_passed']; ?></td>
			<td><?php echo $attend['is_recieved']; ?></td>
			<td><?php echo $attend['certificated_date']; ?></td>
			<td><?php echo $attend['certificated_number']; ?></td>
			<td><?php echo $attend['created']; ?></td>
			<td><?php echo $attend['modified']; ?></td>
			<td><?php echo $attend['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attends', 'action' => 'view', $attend['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attends', 'action' => 'edit', $attend['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attends', 'action' => 'delete', $attend['id']), null, __('Are you sure you want to delete # %s?', $attend['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Students Course'), array('controller' => 'attends', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Groups'); ?></h3>
	<?php if (!empty($user['Group'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Image Path'); ?></th>
		<th><?php echo __('Decription'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Group'] as $group): ?>
		<tr>
			<td><?php echo $group['name']; ?></td>
			<td><?php echo $group['image']; ?></td>
			<td><?php echo $group['image_path']; ?></td>
			<td><?php echo $group['decription']; ?></td>
			<td><?php echo $group['created']; ?></td>
			<td><?php echo $group['modified']; ?></td>
			<td><?php echo $group['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'groups', 'action' => 'view', $group['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'groups', 'action' => 'edit', $group['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'groups', 'action' => 'delete', $group['id']), null, __('Are you sure you want to delete # %s?', $group['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

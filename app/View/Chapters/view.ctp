<div class="col-lg-12 content-right">
<h2><?php echo __('Chapter'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chapter['Field']['name'], array('controller' => 'fields', 'action' => 'view', $chapter['Field']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Decriptions'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['decriptions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Path'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['image_path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Courses'); ?></h3>
	<?php if (!empty($chapter['Course'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
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
	<?php foreach ($chapter['Course'] as $course): ?>
		<tr>
			<td><?php echo $course['name']; ?></td>
			<td><?php echo $course['decription']; ?></td>
			<td><?php echo $course['max_enroll_number']; ?></td>
			<td><?php echo $course['session_number']; ?></td>
			<td><?php echo $course['is_published']; ?></td>
			<td><?php echo $course['is_cancelled']; ?></td>
			<td><?php echo $course['is_master_teaching']; ?></td>
			<td><?php echo $course['is_lock_grade_update']; ?></td>
			<td><?php echo $course['enrolling_expiry_date']; ?></td>
			<td><?php echo $course['grade_update_expiry_date']; ?></td>
			<td><?php echo $course['status']; ?></td>
			<td><?php echo $course['created']; ?></td>
			<td><?php echo $course['modified']; ?></td>
			<td><?php echo $course['id']; ?></td>
			<td><?php echo $course['chapter_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'courses', 'action' => 'view', $course['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'courses', 'action' => 'edit', $course['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courses', 'action' => 'delete', $course['id']), null, __('Are you sure you want to delete # %s?', $course['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

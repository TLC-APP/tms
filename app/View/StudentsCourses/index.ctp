<div class="studentsCourses index">
	<h2><?php echo __('Students Courses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('student_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('is_passed'); ?></th>
			<th><?php echo $this->Paginator->sort('is_recieved'); ?></th>
			<th><?php echo $this->Paginator->sort('certificated_date'); ?></th>
			<th><?php echo $this->Paginator->sort('certificated_number'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($studentsCourses as $studentsCourse): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($studentsCourse['Student']['name'], array('controller' => 'users', 'action' => 'view', $studentsCourse['Student']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($studentsCourse['Course']['name'], array('controller' => 'courses', 'action' => 'view', $studentsCourse['Course']['id'])); ?>
		</td>
		<td><?php echo h($studentsCourse['StudentsCourse']['is_passed']); ?>&nbsp;</td>
		<td><?php echo h($studentsCourse['StudentsCourse']['is_recieved']); ?>&nbsp;</td>
		<td><?php echo h($studentsCourse['StudentsCourse']['certificated_date']); ?>&nbsp;</td>
		<td><?php echo h($studentsCourse['StudentsCourse']['certificated_number']); ?>&nbsp;</td>
		<td><?php echo h($studentsCourse['StudentsCourse']['created']); ?>&nbsp;</td>
		<td><?php echo h($studentsCourse['StudentsCourse']['modified']); ?>&nbsp;</td>
		<td><?php echo h($studentsCourse['StudentsCourse']['id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $studentsCourse['StudentsCourse']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $studentsCourse['StudentsCourse']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $studentsCourse['StudentsCourse']['id']), null, __('Are you sure you want to delete # %s?', $studentsCourse['StudentsCourse']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Students Course'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>

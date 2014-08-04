<div class="attachments index">
	<h2><?php echo __('Attachments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('model'); ?></th>
			<th><?php echo $this->Paginator->sort('foreign_key'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('dir'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('size'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attachments as $attachment): ?>
	<tr>
		<td><?php echo h($attachment['Attachment']['id']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['model']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attachment['QuyetDinhKiemNhiem']['soqd'], array('controller' => 'quyet_dinh_kiem_nhiems', 'action' => 'view', $attachment['QuyetDinhKiemNhiem']['id'])); ?>
		</td>
		<td><?php echo h($attachment['Attachment']['name']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['attachment']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['dir']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['type']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['size']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attachment['Attachment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attachment['Attachment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attachment['Attachment']['id']), null, __('Are you sure you want to delete # %s?', $attachment['Attachment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Attachment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Quyet Dinh Kiem Nhiems'), array('controller' => 'quyet_dinh_kiem_nhiems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quyet Dinh Kiem Nhiem'), array('controller' => 'quyet_dinh_kiem_nhiems', 'action' => 'add')); ?> </li>
	</ul>
</div>

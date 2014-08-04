<div class="attachments view">
<h2><?php echo __('Attachment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quyet Dinh Kiem Nhiem'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachment['QuyetDinhKiemNhiem']['soqd'], array('controller' => 'quyet_dinh_kiem_nhiems', 'action' => 'view', $attachment['QuyetDinhKiemNhiem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['attachment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attachment'), array('action' => 'edit', $attachment['Attachment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attachment'), array('action' => 'delete', $attachment['Attachment']['id']), null, __('Are you sure you want to delete # %s?', $attachment['Attachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quyet Dinh Kiem Nhiems'), array('controller' => 'quyet_dinh_kiem_nhiems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quyet Dinh Kiem Nhiem'), array('controller' => 'quyet_dinh_kiem_nhiems', 'action' => 'add')); ?> </li>
	</ul>
</div>

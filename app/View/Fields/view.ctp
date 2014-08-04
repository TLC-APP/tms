<div class="fields view">
<h2><?php echo __('Field'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($field['Field']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Decription'); ?></dt>
		<dd>
			<?php echo h($field['Field']['decription']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certificated Number Suffix'); ?></dt>
		<dd>
			<?php echo h($field['Field']['certificated_number_suffix']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($field['Field']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Field'), array('action' => 'edit', $field['Field']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Field'), array('action' => 'delete', $field['Field']['id']), null, __('Are you sure you want to delete # %s?', $field['Field']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fields'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Chapters'); ?></h3>
	<?php if (!empty($field['Chapter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Field Id'); ?></th>
		<th><?php echo __('Decriptions'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Image Path'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($field['Chapter'] as $chapter): ?>
		<tr>
			<td><?php echo $chapter['name']; ?></td>
			<td><?php echo $chapter['field_id']; ?></td>
			<td><?php echo $chapter['decriptions']; ?></td>
			<td><?php echo $chapter['image']; ?></td>
			<td><?php echo $chapter['image_path']; ?></td>
			<td><?php echo $chapter['created']; ?></td>
			<td><?php echo $chapter['modified']; ?></td>
			<td><?php echo $chapter['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chapters', 'action' => 'view', $chapter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chapters', 'action' => 'edit', $chapter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chapters', 'action' => 'delete', $chapter['id']), null, __('Are you sure you want to delete # %s?', $chapter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

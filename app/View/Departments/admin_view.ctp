<div class="departments view">
<h2><?php echo __('Department'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($department['Department']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($department['ParentDepartment']['name'], array('controller' => 'departments', 'action' => 'view', $department['ParentDepartment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($department['Department']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Decription'); ?></dt>
		<dd>
			<?php echo h($department['Department']['decription']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($department['Department']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($department['Department']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($department['Department']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($department['Department']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($department['Department']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Department'), array('action' => 'edit', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Department'), array('action' => 'delete', $department['Department']['id']), null, __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Departments'); ?></h3>
	<?php if (!empty($department['ChildDepartment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Phone Number'); ?></th>
		<th><?php echo __('Decription'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($department['ChildDepartment'] as $childDepartment): ?>
		<tr>
			<td><?php echo $childDepartment['name']; ?></td>
			<td><?php echo $childDepartment['parent_id']; ?></td>
			<td><?php echo $childDepartment['phone_number']; ?></td>
			<td><?php echo $childDepartment['decription']; ?></td>
			<td><?php echo $childDepartment['lft']; ?></td>
			<td><?php echo $childDepartment['rght']; ?></td>
			<td><?php echo $childDepartment['created']; ?></td>
			<td><?php echo $childDepartment['modified']; ?></td>
			<td><?php echo $childDepartment['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'departments', 'action' => 'view', $childDepartment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'departments', 'action' => 'edit', $childDepartment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'departments', 'action' => 'delete', $childDepartment['id']), null, __('Are you sure you want to delete # %s?', $childDepartment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="well">
<?php echo $this->Form->create('Department'); ?>
	<fieldset>
		<legend>Cập nhật đơn vị</legend>
	<?php
		echo $this->Form->input('name',array('label'=>'Tên'));
		echo $this->Form->input('parent_id',array('label'=>'Đơn vị trên','required'=>false,'empty'=>'-- chọn đơn vị trên --'));
		echo $this->Form->input('phone_number',array('label'=>'Số nội bộ'));
		echo $this->Form->input('decription',array('label'=>'Miêu tả'));
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end('Cập nhật'); ?>
</div>

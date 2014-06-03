<div class="users view">
<h2>Thông tin học viên</h2>
	<dl>
		<dt>Họ tên</dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>


		<dt>Email</dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt>Ngày sinh</dt>
		<dd>
			<?php echo h($user['User']['birthday']); ?>
			&nbsp;
		</dd>
		<dt>Nơi sinh</dt>
		<dd>
			<?php echo h($user['User']['birthplace']); ?>
			&nbsp;
		</dd>
		<dt>Số điện thoại</dt>
		<dd>
			<?php echo h($user['User']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt>Địa chỉ</dt>
		<dd>
			<?php echo h($user['User']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avatar'); ?></dt>
		<dd>
			<?php echo h($user['User']['avatar']); ?>
			&nbsp;
		</dd>



		
	</dl>
</div>

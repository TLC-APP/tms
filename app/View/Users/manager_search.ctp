<table class="table table-hover">
                    <tr>
                        <th>STT</th>
                        <th><?php echo $this->Paginator->sort('name', 'Tên'); ?></th>
                        <th><?php echo $this->Paginator->sort('username'); ?></th>
                        <th><?php echo $this->Paginator->sort('email'); ?></th>
                        <th><?php echo $this->Paginator->sort('phone_number'); ?></th>
                        <th><?php echo $this->Paginator->sort('avatar'); ?></th>
                        <th><?php echo $this->Paginator->sort('activated', 'Đã kích hoạt'); ?></th>
                        <th><?php echo $this->Paginator->sort('last_login', 'Lần đăng nhập cuối'); ?></th>
                        <th class="actions">#</th>
                    </tr>
                    <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <th><?php echo $stt++ ?></th>
                            <td><?php echo $this->Html->link($user['User']['name'],array('fields_manager'=>true,'action'=>'view',$user['User']['id'])); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['phone_number']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['avatar']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['activated']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['last_login']); ?>&nbsp;</td>
                            <td class="actions">

                                <?php echo $this->Html->link('<button type="button" class="btn btn-info">
                        <span class="glyphicon glyphicon-edit"></span></button>', array('fields_manager'=>true,'action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
                        <span class="glyphicon glyphicon-trash"></span></button>', array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Bạn có chắc xóa %s?', $user['User']['name'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <p>
                <?php
                echo $this->Paginator->counter(array(
                    'format' => __('Trang {:page} của {:pages} trang, hiển thị {:current} của {:count} tất cả, bắt đầu từ {:start}, đến {:end}')
                ));
                ?>	
            </p>
            <?php
            echo $this->Paginator->pagination(array(
                'ul' => 'pagination'
            ));
            ?>
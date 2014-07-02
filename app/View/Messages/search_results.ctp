<div class="table-responsive" id="results">
                <table class="table table-hover" >
                    <tr>
                        <th>STT</th>
                        <th><?php echo $this->Paginator->sort('title', 'Tiêu đề'); ?></th>
                        <th><?php echo $this->Paginator->sort('published', 'Trạng thái'); ?></th>
                        <th><?php echo $this->Paginator->sort('created_user_id', 'Người tạo'); ?></th>
                        <th><?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?></th>
                        <th><?php echo $this->Paginator->sort('category_id', 'Nhóm người dùng'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified', 'Ngày cập nhật'); ?></th>
                        <th class="actions"><?php echo 'Thao tác'; ?></th>
                    </tr>
                    <?php $i = 1;
                    foreach ($messages as $message): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $this->Html->link($message['Message']['title'], array('manager' => true, 'action' => 'view', $message['Message']['id'])); ?></td>
                            <td><?php echo $message['Message']['published']; ?></td>
                            <td>
    <?php echo $this->Html->link($message['User']['name'], array('controller' => 'users', 'action' => 'view', $message['User']['id'])); ?>
                            </td>
                            <td><?php echo h($message['Message']['created']); ?></td>

                            <td><?php
                                if ($message['Message']['category_id'] == 1)
                                    echo 'Tập huấn viên';
                                if ($message['Message']['category_id'] == 2)
                                    echo 'Học viên';
                                if ($message['Message']['category_id'] == 3)
                                    echo 'Tất cả';
                                ?>&nbsp;</td>

                            <td><?php echo h($message['Message']['modified']); ?>&nbsp;</td>
                            <td class="actions">
    <?php echo $this->Html->link('<button type="button" class="btn btn-info">
  <span class="glyphicon glyphicon-edit"></span></button>', array('action' => 'edit', $message['Message']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
  <span class="glyphicon glyphicon-trash"></span></button>', array('action' => 'delete', $message['Message']['id']), array('escape' => false), __('Bạn có chắc xóa thông báo?', $message['Message']['title'])); ?>
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
    ?>	</p>
<?php
echo $this->Paginator->pagination(array(
    'ul' => 'pagination'
));
?>
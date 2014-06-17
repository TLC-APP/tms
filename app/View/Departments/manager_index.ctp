<div class="well">
    <h2>Danh sách các đơn vị</h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th><?php echo $this->Paginator->sort('name', 'Tên'); ?></th>
                <th><?php echo $this->Paginator->sort('parent_id', 'Đơn vị trên'); ?></th>
                <th><?php echo $this->Paginator->sort('phone_number', 'Số điện thoại'); ?></th>
                <th><?php echo $this->Paginator->sort('decription', 'Miêu tả'); ?></th>
                <th><?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?></th>
                <th><?php echo $this->Paginator->sort('modified', 'Ngày sửa'); ?></th>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th class="actions">Menu</th>
            </tr>
            <?php foreach ($departments as $department): ?>
                <tr>
                    <td><?php echo h($department['Department']['name']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($department['ParentDepartment']['name'], array('controller' => 'departments', 'action' => 'view', $department['ParentDepartment']['id'])); ?>
                    </td>
                    <td><?php echo h($department['Department']['phone_number']); ?>&nbsp;</td>
                    <td><?php echo h($department['Department']['decription']); ?>&nbsp;</td>
                    <td><?php echo h($department['Department']['created']); ?>&nbsp;</td>
                    <td><?php echo h($department['Department']['modified']); ?>&nbsp;</td>
                    <td><?php echo h($department['Department']['id']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('sửa', array('action' => 'edit', $department['Department']['id'])); ?>
                        <?php echo $this->Form->postLink('xóa', array('action' => 'delete', $department['Department']['id']), null, __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?>
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
    <?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>

</div>
<div class="btn-toolbar" style="text-align: right;">
    <?php echo $this->Html->link('Thêm mới', array('action' => 'add'), array('class' => 'btn btn-success')); ?>

</div>

<div class="well">
    <h2>Danh sách các đơn vị</h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>STT</th>
                <th><?php echo $this->Paginator->sort('name', 'Tên'); ?></th>
                <th><?php echo $this->Paginator->sort('parent_id', 'Đơn vị trên'); ?></th>
                <th><?php echo $this->Paginator->sort('truong_don_vi_id', 'Trưởng đơn vị'); ?></th>

                <th><?php echo $this->Paginator->sort('phone_number', 'Số nội bộ'); ?></th>
                <th><?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?></th>
                <th><?php echo $this->Paginator->sort('modified', 'Ngày cập nhật'); ?></th>
                <th class="actions">Thao tác</th>
            </tr>
            <?php
            $i = 1;
            foreach ($departments as $department):
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo h($department['Department']['name']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($department['ParentDepartment']['name'], array('controller' => 'departments', 'action' => 'view', $department['ParentDepartment']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($department['TruongDonVi']['name'], array('controller' => 'users', 'action' => 'view', $department['TruongDonVi']['id'])); ?>
                    </td>
                    <td><?php echo h($department['Department']['phone_number']); ?>&nbsp;</td>
                    <td><?php
                        $created = new DateTime($department['Department']['created']);
                        echo $created->format('H:i') . ', ngày: ' . $created->format('d/m/Y');
                        ?>&nbsp;</td>
                    <td><?php
                        $modified = new DateTime($department['Department']['modified']);
                        echo $modified->format('H:i') . ', ngày: ' . $modified->format('d/m/Y');
                        ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<button type="button" class="btn btn-info">
<span class="glyphicon glyphicon-edit"></span></button>', array('action' => 'edit', 'admin' => true, $department['Department']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
<span class="glyphicon glyphicon-trash"></span></button>', array('action' => 'delete', $department['Department']['id']), array('escape' => false), __('Bạn có chắc xóa đơn vị?', $department['Department']['name'])); ?>
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

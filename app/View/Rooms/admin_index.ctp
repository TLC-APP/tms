<div class="well">
    <h2>Danh sách các phòng học</h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
            <?php $i=1; foreach ($rooms as $room): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo h($room['Room']['name']); ?>&nbsp;</td>
                    <td><?php echo $room['Room']['decription']; ?>&nbsp;</td>
                    <td class="actions">
                        
                         <?php echo $this->Html->link('<button type="button" class="btn btn-info">
<span class="glyphicon glyphicon-edit"></span></button>', array('action' => 'edit', $room['Room']['id']), array('escape' => false)); ?>
    <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
<span class="glyphicon glyphicon-trash"></span></button>', array('admin'=>false,'action' => 'delete', $room['Room']['id']), array('escape' => false), __('Bạn có chắc xóa phòng học ?', $room['Room']['name'])); ?>
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

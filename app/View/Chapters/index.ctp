<div class="col-md-10">
    <h2>Danh mục chuyên đề</h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>STT</th>
                <th><?php echo $this->Paginator->sort('name', 'Tên'); ?></th>
                <th><?php echo $this->Paginator->sort('field_id', 'Lĩnh vực'); ?></th>
                <th><?php echo $this->Paginator->sort('created','Ngày tạo'); ?></th>
                <th class="actions">Thao tác</th>
            </tr>
            <?php foreach ($chapters as $chapter): ?>
                <tr>
                    <th>stt</th>
                    <td><?php echo $this->Html->link($chapter['Chapter']['name'], array('action' => 'view', $chapter['Chapter']['id'])); ?></td>
                    <td>
                        <?php echo $this->Html->link($chapter['Field']['name'], array('controller' => 'fields', 'action' => 'view', $chapter['Field']['id'])); ?>
                    </td>
                    <td><?php echo h($chapter['Chapter']['created']); ?>&nbsp;</td>
                    <td class="actions">
                        
                        <?php echo $this->Html->link('<button type="button" class="btn btn-info">
  <span class="glyphicon glyphicon-edit"></span></button>', array('action' => 'edit', $chapter['Chapter']['id']),array('escape'=>false)); ?>
                        <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
  <span class="glyphicon glyphicon-trash"></span></button>', array('action' => 'delete', $chapter['Chapter']['id']), array('escape'=>false), __('Bạn có chắc xóa chuyên đề # %s?', $chapter['Chapter']['name'])); ?>
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
</div>


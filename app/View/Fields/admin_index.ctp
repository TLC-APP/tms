<div class="span10 well">
    <h3 style="font-family: arial">Danh mục lĩnh vực</h3>
    <div class='table-responsive'>
        <table class='table table-hover'>
            <tr>
                <th>STT</th>
                <th><?php echo $this->Paginator->sort('name', 'Tên lĩnh vực'); ?></th>
                <th>Đuôi chứng nhận</th>
                <th>Chỉ số chứng chỉ hiện tại</th>
                <th>Người quản lí</th>
                <th>Thao tác</th>
            </tr>
            <?php $i = 1;
            foreach ($fields as $field):
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo h($field['Field']['name']); ?>&nbsp;</td>
                    <td><?php echo h($field['Field']['certificated_number_suffix']); ?>&nbsp;</td>
                    <td><?php echo h($field['Field']['current_certificate_number']); ?>&nbsp;</td>
                    <td><?php echo h($field['ManageBy']['name']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<button type="button" class="btn btn-info">
<span class="glyphicon glyphicon-edit"></span></button>', array('action' => 'edit', $field['Field']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
<span class="glyphicon glyphicon-trash"></span></button>', array('action' => 'delete', $field['Field']['id']), array('escape' => false), __('Bạn có chắc xóa thông báo?', $field['Field']['id'])); ?>
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
    echo $this->Paginator->pagination(array('ul' => 'pagination'));
    ?>
    <div class="box-footer" style="text-align: right;">
<?php echo $this->Html->link('Thêm mới', array('action' => 'add'), array('class' => 'btn btn-success')); ?>
    </div>
</div>

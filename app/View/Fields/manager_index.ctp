<div class="span10 well">
    <h2>Danh mục lĩnh vực</h2>
    <div class='table-responsive'>
        <table class='table table-hover'>
            <tr>
                <th><?php echo $this->Paginator->sort('name', 'Tên lĩnh vực'); ?></th>
                <th><?php echo $this->Paginator->sort('certificated_number_suffix', 'Đuôi chứng nhận'); ?></th>
                <th>Chỉ số chứng chỉ hiện tại</th>
                <th><?php echo $this->Paginator->sort('manage_user_id', 'Quản lý bởi'); ?></th>
                
                <th class="actions">Thao tác</th>
            </tr>
            <?php foreach ($fields as $field): ?>
                <tr>
                    <td><?php echo h($field['Field']['name']); ?>&nbsp;</td>
                    <td><?php echo h($field['Field']['certificated_number_suffix']); ?>&nbsp;</td>
                    <td><?php echo h($field['Field']['current_certificate_number']); ?>&nbsp;</td>

                    <td><?php echo ($field['ManageBy']['name']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(' <span class="fa fa-edit"></span>', array('action' => 'edit', $field['Field']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="fa fa-trash-o"></span>', array('action' => 'delete', $field['Field']['id']), array('escape' => false), __('Bạn chắc xóa lĩnh vực # %s?', $field['Field']['name'])); ?>
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
</div>

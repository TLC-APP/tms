<div class="span10 well">
    <h2>Danh mục lĩnh vực</h2>
    <div class='table-responsive'>
        <table class='table table-hover'>
            <tr>
                <th><?php echo $this->Paginator->sort('name', 'Tên lĩnh vực'); ?></th>
                <th><?php echo $this->Paginator->sort('certificated_number_suffix'); ?></th>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($fields as $field): ?>
                <tr>
                    <td><?php echo h($field['Field']['name']); ?>&nbsp;</td>
                    <td><?php echo h($field['Field']['certificated_number_suffix']); ?>&nbsp;</td>
                    <td><?php echo h($field['Field']['id']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $field['Field']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $field['Field']['id']), null, __('Are you sure you want to delete # %s?', $field['Field']['id'])); ?>
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
</div>

<div class="col-lg-11">
    <h2>Danh mục khóa học</h2>
    <table class="table-hover table">
        <tr>
            <th>STT</th>

            <th><?php echo $this->Paginator->sort('chapter_id'); ?></th>
            <th><?php echo $this->Paginator->sort('name', 'Tên khóa'); ?></th>
            <th><?php echo $this->Paginator->sort('teacher_id', 'Tập huấn bởi'); ?></th>
            <th><?php echo $this->Paginator->sort('max_enroll_number'); ?></th>
            <th><?php echo $this->Paginator->sort('session_number'); ?></th>
            <th><?php echo $this->Paginator->sort('is_published'); ?></th>
            <th><?php echo $this->Paginator->sort('enrolling_expiry_date'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>

            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($courses as $course): ?>
            <tr>

                <td><?php echo h($course['Course']['name']); ?>&nbsp;</td>

                <td>
                    <?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
                </td>
                <td><?php echo h($course['Course']['max_enroll_number']); ?>&nbsp;</td>
                <td><?php echo h($course['Course']['session_number']); ?>&nbsp;</td>
                <td><?php echo h($course['Course']['is_published']); ?>&nbsp;</td>
                <td><?php echo h($course['Course']['enrolling_expiry_date']); ?>&nbsp;</td>
                <td><?php echo h($course['Course']['created']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $course['Course']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $course['Course']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>

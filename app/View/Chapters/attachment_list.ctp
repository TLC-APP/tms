
<table class="table table-condensed">
    <thead>
        <tr>
            <th>
                STT
            </th>
            <th>
                Tên file
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        $stt = 0;
        foreach ($attachments as $tailieu):
            ?>
            <tr id='attachment_<?php echo $tailieu['Attachment']['id']?>'>
                <td><?php echo ++$stt ?></td>
                <td><?php echo $this->Html->link($tailieu['Attachment']['attachment'], array('fields_manager' => false, 'action' => 'download', $tailieu['Attachment']['id']));
        ?></td>
                <td>
                    <?php
                    //echo $this->Form->postLink('<button class="btn btn-mini btn-warning" type="button">xóa</button>', array('fields_manager' => false, 'controller' => 'attachments', 'action' => 'delete', $tailieu['Attachment']['id']), array('escape' => false), __('bạn chắc xóa file %s?', $tailieu['Attachment']['attachment']));
                    echo $this->Html->link('<button class="btn btn-mini btn-warning" type="button">xóa</button>', '/attachments/delete/' . $tailieu['Attachment']['id'], array('escape' => false, 'class' => 'delete-attachment-button'));
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
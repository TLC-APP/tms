<table class="table table-hover">
    <thead>
    <th>#</th>
    <th>Họ tên</th>
    <th>SĐT</th>
    <th>Email</th>

    <th>Ngày đăng ký</th>
    <th></th>
</thead>
<tbody>
    <?php
    $stt = 1;

    foreach ($students as $student):
        ?>
        <tr>
            <td><?php echo $stt++; ?></td>
            <td><?php echo $this->Html->link($student['Student']['name'], array('fields_manager' => false, 'controller' => 'users', 'action' => 'view_as_student', $student['Student']['id']), array('class' => 'add-button fancybox.ajax')); ?></td>
            <td><?php echo $student['Student']['phone_number']; ?></td>

            <td><?php echo $student['Student']['email']; ?></td>

            <td><?php echo $student['created']; ?></td>
            <td>
                <?php
                echo $this->Form->postLink('<span class="fa fa-trash-o"></span>', array('action' => 'delete', 'controller' => 'attends', $student['id']), array('escape' => false), __('Bạn có chắc hủy tham gia %s?', $student['Student']['name']));
                ?>
            </td>

        </tr>
    <?php endforeach; ?>
</tbody>
</table>
<table class="table table-hover">
    <thead>
    <th>#</th>
    <th>Họ tên</th>
    <th>SĐT</th>
    <th>Email</th>
    <th>Ngày đăng ký</th>
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
            <td><?php  $date_registed=new DateTime($student['created']);
                            echo $date_registed->format('H:i').', ngày: '.$date_registed->format('m/d/Y');
            ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
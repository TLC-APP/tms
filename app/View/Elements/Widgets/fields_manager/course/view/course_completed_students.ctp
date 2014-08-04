<table class="table table-hover">
    <thead>
    <th>#</th>
    <th>Họ tên</th>
    <th>Ngày đăng ký</th>
    <th>Kết quả</th>
    <th>Số chứng nhận</th>
    <th>Ngày cấp</th>
    <th>Đã nhận</th>
</thead>
<tbody>
    <?php
    $stt = 1;
    foreach ($students as $student):
        ?>
        <tr>
            <td><?php echo $stt++; ?></td>
            <td><?php echo $student['Student']['name']; ?></td>
            <td><?php echo $student['created']; ?></td>
            <td><?php echo $student['is_passed']; ?></td>
            <td><?php echo $student['certificated_number']; ?></td>
            <td><?php echo $student['certificated_date']; ?></td>
            <td><?php echo $student['is_recieved']; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
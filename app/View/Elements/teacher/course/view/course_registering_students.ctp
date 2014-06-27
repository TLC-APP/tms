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
            <td><?php echo $student['Student']['name']?></td>
            <td><?php echo $student['Student']['phone_number']; ?></td>
            <td><?php echo $student['Student']['email']; ?></td>
            <td><?php $date_created=new DateTime($student['created']);
                      echo $date_created->format('H:i').', ngày: '.$date_created->format('d/m/Y') ;
            ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
<table class="table table-hover">
    <thead>
    <th>#</th>
    <th>Họ tên</th>
    <th>Ngày đăng ký</th>
    <th>Kết quả</th>
    <th>Số chứng nhận</th>
    <th>Ngày cấp</th>
    <th>Chứng nhận</th>
</thead>
<tbody>
    <?php
    $stt = 1;
    
    foreach ($students as $student):
        ?>
        <tr>
            <td><?php echo $stt++; ?></td>
            <td><?php echo $student['Student']['name']; ?></td>
            <td><?php $ngaydk = new DateTime($student['created']);
                echo $ngaydk->format('H:i').',ngày: '.$ngaydk->format('d/m/Y');?></td>
            <td><?php
                if ($student['is_passed'] == 1)
                    echo '<small class="label label-primary"> Đạt </small>';
                if ($student['is_passed'] == 0)
                    echo '<small class="label label-danger"> Không đạt </small>';
                if ($student['is_passed'] == 2)
                    echo '<small class="label label-warning">Chưa cập nhật</small>';
                ?></td>
            <td><?php echo $student['certificated_number'];
                ?></td>
            <td><?php
            if($student['certificated_date'])
            {
                $certificated_date = new DateTime($student['certificated_date']);
                echo $certificated_date->format('d-m-Y');
            }
                ?></td>
            <td><?php
                if ($student['is_passed'] == 1) {
                    if ($student['is_recieved'] == 1)
                        echo '<small class="label label-primary">Đã cấp chứng nhận</small>';
                    else
                        echo '<small class="label label-warning">Chưa cấp chứng nhận</small>';
                }
                if ($student['is_passed'] == 0)
                    echo '<small class="label label-danger"> Không được cấp chứng nhận </small>';
                ?></td>
        </tr>
<?php endforeach; ?>
</tbody>
</table>
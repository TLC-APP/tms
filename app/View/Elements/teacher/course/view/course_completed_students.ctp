<table class="table table-hover">
    <thead>
    <th>STT</th>
    <th>Họ tên</th>
    <th>Điện thoại</th>
    <th>Email</th>
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
            <td><?php echo $student['Student']['phone_number']; ?></td>
            <td><?php echo $student['Student']['email']; ?></td>
            <td><?php
                $ngaydk = new DateTime($student['created']);
                echo $ngaydk->format('H:i') . ',ngày: ' . $ngaydk->format('d/m/Y');
                ?></td>
            <td>
                <?php
                if(is_null($student['is_passed']))
                {
                     echo '<small class="label label-warning">Chưa cập nhật</small>';
                }else
                {
                   if ($student['is_passed'])
                        echo '<small class="label label-primary"> Đạt </small>';
                    else 
                        echo '<small class="label label-danger"> Không đạt </small>';
                }       
               ?>
            </td>
            <td><?php
            if(is_null($student['is_passed']))
                {
                     echo '<small class="label label-warning">Chưa cập nhật</small>';
                }else{
                  if ($student['is_passed'])
                      echo $student['certificated_number'];
                }
                ?></td>
            
            <td><?php
               if(is_null($student['is_passed']))
                {
                     echo '<small class="label label-warning">Chưa cập nhật</small>';
                }else {
                    if ($student['certificated_date']) {
                        $certificated_date = new DateTime($student['certificated_date']);
                        echo $certificated_date->format('d-m-Y');
                    }
                }
                ?></td>
            <td><?php
                if(is_null($student['is_passed']))
                {
                     echo '<small class="label label-warning">Chưa cập nhật</small>';
                }else
                {
                    if ($student['is_passed']) {
                        if ($student['is_recieved'])
                            echo '<small class="label label-primary">Đã cấp chứng nhận</small>';
                        else
                            echo '<small class="label label-warning">Chưa cấp chứng nhận</small>';
                    }
                    if (!$student['is_passed'])
                        echo '<small class="label label-danger"> Không được cấp chứng nhận </small>';
                }
                ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
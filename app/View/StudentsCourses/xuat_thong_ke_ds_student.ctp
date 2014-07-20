
<div clas="row">
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Đơn vị</th>
                <th>Khóa học</th>
                <th>Chuyên đề</th>
                <th>Lĩnh vực</th>
                <th>Ngày mở khóa</th>
                <th>Tình trạng khóa</th>
                <th>Kết quả</th>
        <tbody>
            <?php $stt = 1;
            foreach ($students_courses as $row) : ?>
                <tr>
                    <td><?php echo $stt++;?></td>
                    <td><?php echo $row['Student']['name'];?></td>
                    <td><?php echo $row['Student']['Department']['name'];?></td>
                    <td><?php echo $row['Course']['name'];?></td>
                    <td><?php echo $row['Course']['Chapter']['name'];?></td>
                    <td><?php echo $row['Course']['Chapter']['Field']['name'];?></td>
                    <td><?php echo $row['Course']['created'];?></td>
                    <td><?php echo $row['Course']['status'];?></td>
                    <td><?php echo $row['StudentsCourse']['is_passed'];?></td>

                </tr>
<?php endforeach; ?>
        </tbody>



        </tr>
        </thead>
    </table>
</div>
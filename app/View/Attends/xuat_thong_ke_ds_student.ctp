
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
            <?php
            $stt = 1;
            foreach ($attends as $row) :
                ?>
                <?php
                switch ($row['Course']['status']) {
                    case COURSE_CANCELLED:
                        $status = 'Đã hủy';
                        break;
                    case COURSE_COMPLETED:
                        $status = 'Đã hoàn thành';
                        break;
                    case COURSE_UNCOMPLETED:
                        $status = 'Chưa hoàn thành';
                        break;
                    case COURSE_REGISTERING:
                        $status = 'Đang đăng ký';
                        break;

                    default:
                        break;
                }
                ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo $row['Student']['name']; ?></td>
                    <td><?php echo $row['Student']['Department']['name']; ?></td>
                    <td><?php echo $row['Course']['name']; ?></td>
                    <td><?php echo $row['Course']['Chapter']['name']; ?></td>
                    <td><?php echo $row['Course']['Chapter']['Field']['name']; ?></td>
                    <td><?php echo $row['Course']['created']; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $row['Attend']['is_passed']; ?></td>

                </tr>
<?php endforeach; ?>
        </tbody>



        </tr>
        </thead>
    </table>
    <div style="text-align: right;">
        <?php
        if (!empty($attends)) {
            echo $this->Html->link('Xuất báo cáo (excel)', array(1), array('class' => 'btn btn-success'));
        }
        ?>

    </div>
</div>

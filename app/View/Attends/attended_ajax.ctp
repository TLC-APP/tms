<table class="table table-condensed">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên khóa</th>
            <th>Chuyên đề</th>
            <th>Tập huấn bởi</th>
            <th>Chứng nhận</th>
            <th>Trạng thái</th>
        </tr>
    </thead>

    <?php
    $stt = 1;
    foreach ($courses_attended as $course_attended):
        ?>
        <tr>
            <td><?php echo $stt++; ?></td>
            <td><?php echo $this->Html->link($course_attended['Course']['name'], array('student' => true, 'controller' => 'courses', 'action' => 'view', $course_attended['Course']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax'));
        ?>&nbsp;

            </td>
            <td><?php echo $course_attended['Course']['Chapter']['name']; ?>&nbsp;</td>

            <td><?php echo $course_attended['Course']['Teacher']['name']; ?></td>

            <td><?php
                if ($course_attended['Attend']['is_passed'] == 1)
                    echo "Đã có chứng nhận";
                else
                    echo "Chưa có chứng nhận";
                ?></td>

            <td><?php
                if ($course_attended['Attend']['is_recieved'] == 1)
                    echo "Đã cấp";
                else
                    echo "Chưa cấp";
                ?></td>

        </tr>
    <?php endforeach; ?>
</table>
<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Trang {:page} của {:pages} trang, hiển thị {:current} của {:count} tất cả, bắt đầu từ {:start}, đến {:end}')
    ));
    ?>	</p>
<?php
echo $this->Paginator->pagination(array(
    'ul' => 'pagination'
));
?>
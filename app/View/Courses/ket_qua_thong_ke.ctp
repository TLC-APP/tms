<table class="table-hover table">
    <tr>
        <th>STT</th>
        <th>Tên khóa</th>
        <th>Chuyên đề</th>
        <th>Tập huấn bởi</th>
        <th>Đăng ký tối đa</th>
        <th>Đã đăng ký</th>
        <th>Xuất bản</th>
        <th>Hết hạn đăng ký</th>
        <th>Ngày tạo</th>
        <th>Người tạo</th>

    </tr>
    <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>

    <?php foreach ($courses as $course): ?>

        <tr>
            <th><?php echo $stt++; ?></th>

            <td>
                <?php
                echo $course['Course']['name'];
                $register_student_number = $course['Course']['register_student_number'];
                if ($course['Course']['max_enroll_number'] > 0) {
                    $percent = round(($register_student_number * 100) / $course['Course']['max_enroll_number']);
                } else {
                    $percent = 0;
                }
                ?>
            <td>
                <?php echo $course['Chapter']['name']; ?>
            </td>
            <td>
                <?php echo $course['Teacher']['name']; ?>
            </td>
            <td><?php echo h($course['Course']['max_enroll_number']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['register_student_number']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['is_published']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['enrolling_expiry_date']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['created']); ?>&nbsp;</td>
            <td><?php echo h($course['User']['name']); ?>&nbsp;</td>

            <td class="tools">
            </td>
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
<div style="text-align: right;">
    <?php if (!empty($courses)) {
        echo $this->Html->link('Xuất báo cáo', array(1), array('class' => 'btn btn-success'));
    }
    ?>

</div>
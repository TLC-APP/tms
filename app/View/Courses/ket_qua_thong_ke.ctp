<table class="table-hover table">
    <tr>
        <th>STT</th>
        <th><?php echo $this->Paginator->sort('name', 'Tên khóa'); ?></th>
        <th><?php echo $this->Paginator->sort('chapter_id', 'Chuyên đề'); ?></th>
        <th><?php echo $this->Paginator->sort('teacher_id', 'Tập huấn bởi'); ?></th>
        <th><?php echo $this->Paginator->sort('max_enroll_number', 'Đăng ký tối đa'); ?></th>
        <th><?php echo $this->Paginator->sort('register_student_number', 'Đã đăng ký'); ?></th>

        <th><?php echo $this->Paginator->sort('is_published', 'Xuất bản'); ?></th>
        <th><?php echo $this->Paginator->sort('enrolling_expiry_date', 'Hết hạn đăng ký'); ?></th>
        <th><?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?></th>
        <th><?php echo $this->Paginator->sort('created_user_id', 'Người tạo'); ?></th>

        <th class="actions">Thao tác</th>
    </tr>
    <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>

    <?php foreach ($courses as $course): ?>

        <tr>
            <th><?php echo $stt++; ?></th>

            <td>
                <?php
                echo $this->Html->link($course['Course']['name'], array('manager' => true, 'controller' => 'courses', 'action' => 'view', $course['Course']['id']));
                $register_student_number = $course['Course']['register_student_number'];
                if ($course['Course']['max_enroll_number'] > 0) {
                    $percent = round(($register_student_number * 100) / $course['Course']['max_enroll_number']);
                } else {
                    $percent = 0;
                }
                ?>

            <td>
                <?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
            </td>
            <td>
                <?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
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
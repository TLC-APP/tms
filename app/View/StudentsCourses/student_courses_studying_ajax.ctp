<table class="table table-condensed">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên khóa</th>
            <th>Chuyên đề</th>
            <th>Số buổi</th>
            <th>Tập huấn bởi</th>
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
            <td><?php echo $course_attended['Course']['session_number']; ?>&nbsp;</td>
            <td><?php
                echo $this->Html->link($course_attended['Course']['Teacher']['name'], array('student' => true, 'controller' => 'users', 'action' => 'view_teacher', $course_attended['Course']['Teacher']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax'))
                ?></td>
        </tr>
    <?php endforeach; ?>
</table>

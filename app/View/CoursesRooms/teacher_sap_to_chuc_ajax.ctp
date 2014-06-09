<table class="table table-condensed">
    <thead>
        <tr>
            <th>#</th>
            <th>Tên khóa học</th>
            <th>Chuyên đề</th>
            <th>Số buổi</th>
            <th>Sĩ số</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1;
        ?>
        <?php foreach ($teacher_courses as $teacher_course): ?>
            <tr>
                <td><?php echo $stt++; ?></td>
                <td><?php echo $this->Html->link($teacher_course['Course']['name'], array('student' => true, 'controller' => 'courses', 'action' => 'view', $teacher_course['Course']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax'))
            ?></td>
                <td><?php echo $teacher_course['Course']['Chapter']['name']; ?></td>
                <td><?php echo $teacher_course['Course']['session_number']; ?></td>
                <td><?php echo $teacher_course['Course']['register_student_number']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table><!--//table-->

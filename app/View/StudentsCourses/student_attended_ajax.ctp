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
                <td><?php
                            echo $this->Html->link($course_attended['Course']['Teacher']['name'], array('student' => true, 'controller' => 'users', 'action' => 'view_teacher', $course_attended['Course']['Teacher']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax'))
                            ?></td>
            <td><?php
                            if ($course_attended['StudentsCourse']['is_passed'])
                                echo '<small class="label label-primary"> đạt </small>';
                            else
                                echo '<small class="label label-warning"> không đạt </small>';
                            ?></td>
                        <td>
                            <?php
                            if ($course_attended['StudentsCourse']['is_passed']) {
                                if ($course_attended['StudentsCourse']['is_recieved'] == 1)
                                    echo '<small class="label label-primary"> đã nhận </small>';
                                else
                                    echo '<small class="label label-warning"> chưa nhận </small>';
                            }
                            ?></td>

        </tr>
    <?php endforeach; ?>
</table>

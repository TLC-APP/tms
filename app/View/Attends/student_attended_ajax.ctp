<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên khóa</th>
            <th>Chuyên đề</th>
            <th>Tập huấn bởi</th>
            <th>Kết quả</th>
            <th>Chứng nhận</th>
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
                if ($course_attended['Attend']['is_passed'])
                    echo '<small class="label label-primary"> Đạt </small>';
                else
                    echo '<small class="label label-warning"> Không đạt </small>';
                ?></td>
            <td>
                <?php
                if ($course_attended['Attend']['is_passed']) {
                    if ($course_attended['Attend']['is_recieved'] == 1)
                        echo '<small class="label label-primary"> Đã nhận </small>';
                    else
                        echo '<small class="label label-warning"> Chưa nhận </small>';
                }
                ?></td>

        </tr>
    <?php endforeach; ?>
</table>
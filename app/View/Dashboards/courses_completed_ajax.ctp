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
                    <?php foreach ($courses_completed as $course_completed): ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo $this->Html->link($course_completed['Course']['name'], array('guest' =>true, 'controller' => 'courses', 'action' => 'view1', $course_completed['Course']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax'));
                        ?>&nbsp;</td>
                            <td><?php echo $course_completed['Course']['Chapter']['name']; ?></td>
                            <td><?php echo $course_completed['Course']['session_number']; ?></td>
                            <td><?php echo $course_completed['Course']['register_student_number']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
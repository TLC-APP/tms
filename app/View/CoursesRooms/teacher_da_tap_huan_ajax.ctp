<table class="table table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên khóa học</th>
                        <th>Chuyên đề</th>
                        <th>Sĩ số</th>
                     </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1;
                    ?>
                    <?php foreach ($teacher_courses_completed as $teacher_course_completed): ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo $this->Html->link($teacher_course_completed['Course']['name'], array('teacher' => true, 'controller' => 'courses', 'action' => 'view', $teacher_course_completed['Course']['id']), array('escape' => false, 'class' => false))
                        ?></td>
                            <td><?php echo $teacher_course_completed['Course']['Chapter']['name']; ?></td>
                            <td><?php echo $teacher_course_completed['Course']['register_student_number']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
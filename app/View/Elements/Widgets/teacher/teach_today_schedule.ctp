<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-calendar"></i> Lịch tập huấn hôm nay</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">                      
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 20%">Tên khóa học</th>
                        <th>Chuyên đề</th>
                        <th>Bắt đầu</th>
                        <th>Địa điểm</th>
                        <th>Sĩ số</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    //debug($courses_today);die;
                    $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1;
                    ?>
                    <?php foreach ($teacher_courses_today as $teacher_course_today): ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo $this->Html->link($teacher_course_today['Course']['name'], array('teacher' => true, 'controller' => 'courses', 'action' => 'view', $teacher_course_today['Course']['id']), array('escape' => false, 'class' => false))
                        ?></td>                            <td><?php echo $teacher_course_today['Course']['Chapter']['name']; ?></td>
                            <td><?php
                                $start = new DateTime($teacher_course_today['CoursesRoom']['start']);
                                echo $start->format('H:i');
                                echo", ngày: ";
                                echo $start->format('d/m/Y');
                                ?></td>
                            <td><?php echo $teacher_course_today['Room']['name']; ?></td>
                            <td><?php echo $teacher_course_today['Course']['register_student_number']; ?></td>
                        </tr>
<?php endforeach; ?>
                </tbody>
            </table><!--//table-->
        </div>
    </div>
</div>
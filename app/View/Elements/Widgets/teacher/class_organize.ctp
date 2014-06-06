<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-thumb-tack"></i> Lớp tập huấn đang đăng kí của tôi</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">                      
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên khóa học</th>
                        <th>Chuyên đề</th>
                        <th>Số buổi</th>
                        <th>Giới hạn đăng ký</th>
                        <th>Có thể đăng ký thêm</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1;
                    ?>
                    <?php foreach ($courses_organize as $course_organize): ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo $this->Html->link($course_organize['Course']['name'], array('student' => true, 'controller' => 'courses', 'action' => 'view', $course_organize['Course']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax'))
                        ?></td>
                            <td><?php echo $course_organize['Chapter']['name']; ?></td>
                            <td><?php echo $course_organize['Course']['session_number']; ?></td>
                            <td><?php echo $course_organize['Course']['max_enroll_number']; ?></td>
                            <td><?php echo ($course_organize['Course']['max_enroll_number'] - $course_organize['Course']['register_student_number']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><!--//table-->
        </div>
    </div>
</div>
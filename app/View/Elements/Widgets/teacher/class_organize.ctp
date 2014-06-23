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
                        <th>Đã đăng kí</th>
                        <th>Ngày hết hạn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1;
                    ?>
                    <?php foreach ($courses_organize as $course_organize): ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo $this->Html->link($course_organize['Course']['name'], array('teacher' =>true, 'controller' => 'courses', 'action' => 'view1', $course_organize['Course']['id']), array('escape' => false, 'class' =>false))
                        ?></td>
                            <td><?php echo $course_organize['Chapter']['name']; ?></td>
                            <td><?php echo $course_organize['Course']['register_student_number'];  ?></td>
                            <td><?php 
                            $start = new DateTime($course_organize['Course']['enrolling_expiry_date']);
                                echo $start->format('H:i');
                                echo", ngày: ";
                                echo $start->format('d/m/Y');
                            ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><!--//table-->
        </div>
    </div>
</div>
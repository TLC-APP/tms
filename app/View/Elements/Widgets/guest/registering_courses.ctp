<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-thumb-tack"></i> Lớp tập huấn có thể đăng ký</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">                      
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 20%">Tên khóa học</th>
                        <th style="width: 20%">Chuyên đề</th>
                        <th>Đã đăng kí</th>                        
                        <th>Ngày hết hạn</th>
                        <th>Tập huấn viên</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo $this->Html->link($course['Course']['name'], array('guest' => true, 'controller' => 'courses', 'action' => 'view', $course['Course']['id']), array('class' => 'add-button fancybox.ajax')) ?></td>
                            <td><?php echo $course['Chapter']['name'] ?></td>
                            <td><?php echo $course['Course']['register_student_number']; ?></td>
                            <td><?php
                                $start = new DateTime($course['Course']['enrolling_expiry_date']);
                                echo $start->format('H:i');
                                echo", ngày ";
                                echo $start->format('d/m/Y');
                                ?>
                            </td>
                            <td><?php echo $this->Html->link($course['Teacher']['name'], array('guest' => true, 'controller' => 'users', 'action' => 'view_teacher', $course['Teacher']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax')) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
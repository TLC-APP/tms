
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
                        <th style="width: 18%">Chuyên đề</th>
                        <th style="width: 10%">Số buổi</th>
                        <th>Tập huấn bởi</th>
                        <th>Ngày hết hạn</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td>
                                <?php echo $this->Html->link($course['Course']['name'], array('student' => true, 'controller' => 'courses', 'action' => 'view', $course['Course']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax'))
                                ?>
                            </td>
                            <td><?php echo $course['Chapter']['name'] ?></td>
                            <td><?php echo count($course['CoursesRoom']); ?></td>
                            <td><?php
                            echo $this->Html->link($course['Teacher']['name'], array('student' => true, 'controller' => 'users', 'action' => 'view_teacher', $course['Teacher']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax'))
                                ?></td>
                            <td><?php
                            $start = new DateTime($course['Course']['enrolling_expiry_date']);
                            echo $start->format('H:i');
                            echo", ngày: ";
                            echo $start->format('d/m/Y');
                                ?></td>

                            <td>
                                <?php echo $this->Html->link('<span class="label label-success">Đăng ký</span>', array('student'=>false,'controller' => 'attends', 'action' => "register", $course['Course']['id']), array('escape' => false)); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><!--//table-->
        </div>
    </div>
</div>
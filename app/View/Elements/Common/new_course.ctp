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
                        <th style="width: 15%">Tên khóa học</th>
                        <th>Chuyên đề</th>
                        <th>Số buổi</th>
                        <th>Giới hạn đăng ký</th>
                        <th>Có thể đăng ký thêm</th>                        
                        <th>Ngày hết hạn</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td><?php echo $stt++;?></td>
                            <td><?php echo $this->Html->link($course['Course']['name'],
                                    array('student'=>true,'controller'=>'courses','action'=>'view',$course['Course']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax')) ?></td>
                            <td><?php echo $course['Chapter']['name'] ?></td>
                            <td><?php echo count($course['CoursesRoom']); ?></td>
                            <td><?php echo $course['Course']['max_enroll_number']; ?></td>
                            <td><?php echo ($course['Course']['max_enroll_number'] - $course['Course']['register_student_number']); ?></td>
                            <td><?php  $start= new DateTime($course['Course']['enrolling_expiry_date']);echo " Giờ: "; echo $start->format('H:i'); echo", Ngày: ";echo $start->format('d/m/Y');?></td>

                            <td><a href="/students_courses/register/<?php echo $course['Course']['id']?>"><span class="label label-success">Đăng ký</span></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><!--//table-->
        </div>
    </div>
</div>
<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-thumb-tack"></i> Danh sách các khóa đã tham dự</h3>
    </div>
    <div class="panel-body">
        <?php echo $this->Form->create('Field', array('id' => 'FieldSearchForm', 'method' => 'post', 'action' => 'student_courses_attended', 'class' => 'course-finder-form')); ?>
        <div class="row">
            <div class="col-md-3 col-sm-3 subject">
                <?php echo $this->Form->input('field_id', array('label' => false, 'name' => 'field_name', 'type' => 'select', 'options' => $fields, 'class' => "form-control subject", 'empty' => '-- chọn lĩnh vực --')); ?>
            </div> 
            <button type="submit" class="btn btn-theme"><i class="fa fa-search"></i></button>
        </div>                     
        <?php echo $this->Form->end(); ?>
        <?php
        $data = $this->Js->get('#FieldSearchForm')->serializeForm(array('isForm' => true, 'inline' => true));
        $this->Js->get('#FieldSearchForm')->event(
                'submit', $this->Js->request(
                        array('action' => 'attended', 'student' => true), array(
                    'update' => '#aftersearch',
                    'data' => $data,
                    'async' => true,
                    'dataExpression' => true,
                    'method' => 'POST'
                        )
                )
        );
        echo $this->Js->writeBuffer();
        ?>
        <div class="table-responsive" id="aftersearch">                      
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
        </div>
    </div>
</div>

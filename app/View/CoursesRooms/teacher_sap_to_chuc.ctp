<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-thumb-tack"></i> Lớp tập huấn sắp tổ chức của tôi</h3>
    </div>
    <div class="panel-body">

        <?php echo $this->Form->create('Field', array('id' => 'FieldSearchForm', 'method' => 'post', 'action' => 'teacher_sap_to_chuc', 'class' => 'course-finder-form')); ?>
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
                        array('action' => 'sap_to_chuc', 'teacher' => true), array(
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
                    <?php
                    foreach ($teacher_courses as $teacher_course): ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo $this->Html->link($teacher_course['Course']['name'], array('teacher' => true, 'controller' => 'courses', 'action' => 'view', $teacher_course['Course']['id']), array('escape' => false, 'class' => false))
                    ?></td>
                            <td><?php echo $teacher_course['Course']['Chapter']['name']; ?></td>
                            <td><?php echo $teacher_course['Course']['register_student_number']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><!--//table-->
        </div>
    </div>
</div>
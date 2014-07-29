<div class="panel panel-theme">
    <div class="panel-heading">

        <h3 class="panel-title"><i class="fa fa-thumb-tack"></i> Khóa học đã hoàn thành</h3>
        <div class="box-tools">
            <?php echo $this->Form->create('Field', array('id' => 'FieldSearchForm', 'method' => 'post', 'action' => 'courses_completed', 'class' => 'course-finder-form')); ?>
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
                            array('action' => 'courses_completed', 'dashboards' => true), array(
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
        </div>

    </div>
    <div class="panel-body">

        <div class="page-content">   

            <div class="row page-row" id="aftersearch">
                <?php foreach ($courses_completed as $course_completed): ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                        <div class="album-cover">
                            <?php
                            echo $this->Html->link(
                                    $this->Html->image('/files/course/image/' . $course_completed['Course']['image_path'] . '/' . h($course_completed['Course']['image']), array('class' => "img-responsive img-thumbnail", 'style' => "width: 300px; height: 200px;")), array('guest' => true, 'controller' => 'courses', 'action' => 'view', $course_completed['Course']['id']), array('escape' => false, 'class' => ' prettyphoto add-button fancybox.ajax')
                            );
                            ?>
                        </div>
                        <div class="desc">
                            <h4><small><a href="#"><?php echo $course_completed['Course']['name'] ?></a></small></h4>
                            
                        </div>
                    </div>
                <?php endforeach; ?>
            </div><!--//page-row-->

        </div><!--//page-content-->
    </div>
</div>

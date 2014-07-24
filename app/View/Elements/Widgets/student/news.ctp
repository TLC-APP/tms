<?php if(count($courses_register)>0) {?>
<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class=" glyphicon glyphicon-bullhorn"></i> Khóa học mới đăng kí</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">                      
            <table class="table table-condensed">
                <thead>
                <th>STT</th><th>Tên khóa học</th>
                </thead>
                <tbody>
                    <?php
                    $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>
                    <?php foreach ($courses_register as $course_register): ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo $this->Html->link($course_register['Course']['name'], array('student' => true, 'controller' => 'courses', 'action' => 'view', $course_register['Course']['id']), array('escape' => false, 'class' => 'add-button fancybox.ajax')) ?></td>
                            <td>
                                <?php echo $this->Html->link('<button class="btn btn-info btn-sm">Hủy</button>',array('student'=>false,'controller'=>'attends','action'=>'canceled',$course_register['Course']['id']),array('escape'=>false));?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><!--//table-->
        </div>

    </div>
</div>
<?php }else{ ?>
<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class=" glyphicon glyphicon-bullhorn"></i> Bạn chưa đăng kí khóa học mới nào.</h3>
    </div>
   </div>
<?php }?>

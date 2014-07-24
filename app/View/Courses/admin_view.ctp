<?php echo $this->Html->script('jquery.shorten.1.0'); ?>
<div class="col-lg-12 content-right">

    <div class="row">
        <h3 class="page-header">Khóa học: <?php echo $course['Course']['name'] ?> </h3>
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li class="active"><a data-toggle="tab" href="#tab_2-4">Lịch học</a></li>
                    <li class=""><a data-toggle="tab" href="#tab_2-5">Tài liệu</a></li>
                    <li class=""><a data-toggle="tab" href="#tab_hoc_vien">Học viên</a></li>
                    <li class=""><a data-toggle="tab" href="#tab_2-2">Thông tin</a></li>
                    <li class=""><a data-toggle="tab" href="#tab_1-1">Nội dung</a></li>

                </ul>
                <div class="tab-content">
                    <div id="tab_hoc_vien" class="tab-pane">

                        <?php if ($course['Course']['status'] == COURSE_COMPLETED) echo $this->element('admin/course/view/course_completed_students', array('students' => $course['Attend'])); ?>

                        <?php if ($course['Course']['status'] == COURSE_REGISTERING) echo $this->element('admin/course/view/course_registering_students', array('students' => $course['Attend'])); ?>
                        <?php echo $this->Html->link(' In danh sách', array('admin'=>false,'controller'=>'courses','action'=>'print_student',$course['Course']['id']), array('class' => 'btn btn-info fa fa-print')); ?>
                    </div><!-- /.tab-pane -->
 
                    <div id="tab_1-1" class="tab-pane">
                        <div class="noi_dung" >
                            <img alt="" class="pull-left"  style="padding-right: 10px; width: 500px;"src="/files/course/image/<?php echo $course['Course']['image_path'] . '/' . $course['Course']['image']; ?>">

                            <p><?php echo $course['Course']['decription']; ?></p>
                        </div>
                    </div><!-- /.tab-pane -->
                    <div id="tab_2-2" class="tab-pane">
                        <table class="table table-condensed">

                            <tbody style="font-size: 15px;">
                                <tr>
                                    <td>Tập huấn bởi</td>
                                    <td><?php if (!empty($course['Teacher']['HocHam']['name'])): ?>

                                            <?php echo $course['Teacher']['HocHam']['name'] . ' '; ?>

                                        <?php endif; ?>
                                        <?php if (!empty($course['Teacher']['HocVi']['name'])): ?>                                             
                                            <?php echo $course['Teacher']['HocVi']['name'] . ' '; ?>

                                        <?php endif; ?>
                                        <?php echo $this->Html->link($course['Teacher']['name'], array('fields_manager' => true, 'controller' => 'users', 'action' => 'view', $course['Teacher']['id'])) ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Số buổi</td>
                                    <td><?php echo count($course['CoursesRoom']); ?></td>
                                </tr>
                                <tr>
                                    <td>Số lượng đăng ký tối đa</td> 
                                    <td><?php echo $course['Course']['max_enroll_number']; ?></td>
                                </tr>
                                <tr>
                                    <td>Hạn đăng ký</td> 
                                    <td>
                                        <span class="text-red"><?php $enrolling_expiry_date=new DateTime($course['Course']['enrolling_expiry_date']);
                                        echo $enrolling_expiry_date->format('H:i').', ngày: '.$enrolling_expiry_date->format('d/m/Y');
                                        ?></span>
                                    </td>
                                </tr>
                                <tr><td>Đã xuất bản</td><td><?php echo $course['Course']['is_published']; ?></td></tr>
                                <tr><td> Tình trạng</td><td><?php echo $course['Course']['status']; ?></td></tr>

                                <tr>
                                    <td>Chuyên đề</td>
                                    <td>                 
                                        <?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
                                    </td>
                                </tr>



                            </tbody>
                        </table>
                    </div><!-- /.tab-pane -->

                    <div id="tab_2-4" class="tab-pane active">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="well">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <?php
                                            if (!empty($course['CoursesRoom']))
                                                echo $this->element('Common/do_schedule', array('course_id' => $course['Course']['id'], 'buoi_dau_tien' => $course['CoursesRoom'][0]['start']));
                                            else
                                                echo $this->element('Common/do_schedule', array('course_id' => $course['Course']['id']));
                                            ?>
                                            <?php echo $this->element('Widgets/fields_manager/schedule'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div id="tab_2-5" class="tab-pane">
                        <div class="row">
                            <div class="col-md-12">
                                <div class='col-md-6'>
                                    <div class="box box-solid">
                                        <div class="box-header">
                                            <h3 class="box-title">Tài liệu chuyên đề</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="table-responsive" id="chapter_attachments_list">
                                                <table class="table table-condensed">
                                                    <thead><tr><th>STT</th><th>Tên file</th></tr></thead>
                                                    <tbody>
                                                        <?php
                                                        $stt = 0;
                                                        foreach ($course['Chapter']['Attachment'] as $tailieu):
                                                            ?>
                                                            <tr id='attachment_<?php echo $tailieu['id'] ?>'>
                                                                <td><?php echo ++$stt ?></td>
                                                                <td><?php echo $this->Html->link($tailieu['attachment'], array('fields_manager' => false, 'controller' => 'chapters', 'action' => 'download', $tailieu['id'])); ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div><!-- /.box-body -->
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="box box-solid">
                                        <div class="box-header">
                                            <h3 class="box-title">Tài liêu của khóa</h3>
                                            <div class="box-tools pull-right">
                                                <div data-toggle="btn-toggle" class="btn-group">
                                                    <?php
                                                    echo $this->Html->link(
                                                            '<button class="btn btn-success btn-xs active" type="button">'
                                                            . '<span><i class="fa fa-plus"></i> Đính kèm</span></button>', '/courses/upload/' . $course['Course']['id'], array('escape' => false,
                                                        'class' => 'add-button fancybox.ajax'));
                                                    ?>

                                                </div>
                                            </div>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="table-responsive" id="attachments_list">

                                                <table class="table table-condensed">
                                                    <thead><tr><th>#</th><th>Tên file</th><th></th></tr></thead>
                                                    <tbody>
                                                        <?php
                                                        $stt = 0;
                                                        foreach ($course['Attachment'] as $tailieu):
                                                            ?>
                                                            <tr id='attachment_<?php echo $tailieu['id'] ?>'>
                                                                <td><?php echo ++$stt ?></td>
                                                                <td><?php echo $this->Html->link($tailieu['attachment'], array('fields_manager' => false, 'action' => 'download', $tailieu['id']));
                                                        ?></td>
                                                                <td>
                                                                    <?php
                                                                    //echo $this->Form->postLink('<button class="btn btn-mini btn-warning" type="button">xóa</button>', array('fields_manager' => false, 'controller' => 'attachments', 'action' => 'delete', $tailieu['Attachment']['id']), array('escape' => false), __('bạn chắc xóa file %s?', $tailieu['Attachment']['attachment']));
                                                                    echo $this->Html->link('<button class="btn btn-mini btn-warning" type="button">xóa</button>', '/attachments/delete/' . $tailieu['id'], array('escape' => false, 'class' => 'delete-attachment-button'));
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                 
                </div><!-- /.tab-content -->
            </div>
            <div class="btn-toolbar pull-right">
                <?php echo $this->Html->link('SỬA', array('admin'=>true,'controller'=>'courses','action'=>'edit',$course['Course']['id']),array('class' => 'btn btn-info')); ?>
                <?php
                if ($course['Course']['status'] != COURSE_CANCELLED)
                    echo $this->Form->postLink('<span class="fa fa-ban">Hủy</span>', array('admin' => false, 'action' => 'huy', $course['Course']['id']), array('escape' => false, 'class' => 'btn btn-warning'), __('Bạn có chắc hủy khóa học # %s?', $course['Course']['name'] . ' - ' . $course['Chapter']['name']));
                else {
                    echo $this->Form->postLink('                                
  <span class="fa fa-refresh">Khôi phục</span>', array('admin' => false, 'action' => 'uncancel', $course['Course']['id']), array('escape' => false,'class'=>'btn btn-info'), __('Bạn có chắc phục hồi khóa học # %s?', $course['Course']['name'] . ' - ' . $course['Chapter']['name']));

                }
                ?>
            </div>
        </div>
    </div>
    <hr>
</div>
<script>

    $('.noi_dung').shorten({
        showChars: '4000',
        moreText: 'Đọc thêm',
        lessText: 'Đóng lại'
    });
</script>
<script>
    $(function() {
        $('.delete-attachment-button').live('click', function(e) {
            var tr = $(this).parent().parent();
            e.preventDefault(); // prevent native submit            
            var href = $(this).attr('href');

            if (confirm('Bạn chắc không ?') === true) {
                $.ajax({
                    type: "POST",
                    url: href
                }).done(function(data, textStatus, jqXHR) {
                    var response = JSON.parse(data);
                    if (response.status === 1) {
                        tr.fadeOut(400, function() {
                            tr.remove();
                        });
                    } else {
                        alert('Lỗi xóa không thành công');
                    }
                });
            }

            return false;
        });
    });
</script>
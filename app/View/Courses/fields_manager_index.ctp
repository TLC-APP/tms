<?php
$statusText = "";
if (isset($status)) {

    switch ($status) {
        case COURSE_CANCELLED:
            $statusText = ' đã hủy';
            break;
        case COURSE_COMPLETED:
            $statusText = ' đã hoàn thành';
            break;
        case COURSE_OPENABLE:
            $statusText = ' đủ điều kiện mở lớp';
            break;
        case COURSE_REGISTERING:
            $statusText = ' đang đăng ký';
            break;
        default:
            $statusText = ' chưa hoàn thành';
            break;
    }
}
?>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3>Danh mục khóa học <?php echo $statusText; ?></h3>
            <div class="box-tools">

            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table-hover table">
                <tr>
                    <th>STT</th>
                    <th><?php echo $this->Paginator->sort('name', 'Tên khóa'); ?></th>
                    <th><?php echo $this->Paginator->sort('chapter_id', 'Chuyên đề'); ?></th>
                    <th><?php echo $this->Paginator->sort('teacher_id', 'Tập huấn bởi'); ?></th>
                    <th><?php echo $this->Paginator->sort('max_enroll_number', 'Đăng ký tối đa'); ?></th>
                    <th><?php echo $this->Paginator->sort('register_student_number', 'Đã đăng ký'); ?></th>

                    <th><?php echo $this->Paginator->sort('is_published', 'Xuất bản'); ?></th>
                    <th><?php echo $this->Paginator->sort('enrolling_expiry_date', 'Hết hạn đăng ký'); ?></th>
                    <th><?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?></th>

                    <th class="actions">Thao tác</th>
                </tr>
                <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>

                <?php foreach ($courses as $course): ?>

                    <tr>
                        <th><?php echo $stt++; ?></th>

                        <td>
                            <?php
                            echo $this->Html->link($course['Course']['name'], array('fields_manager' => true, 'controller' => 'courses', 'action' => 'view', $course['Course']['id']));
                            $register_student_number = $course['Course']['register_student_number'];
                            if ($course['Course']['max_enroll_number'] > 0) {
                                $percent = round(($register_student_number * 100) / $course['Course']['max_enroll_number']);
                            } else {
                                $percent = 0;
                            }
                            ?>

                            <div class="progress progress-bar-yellow progress-striped">
                                <div style="width: <?php echo $percent; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $percent; ?>" role="progressbar" class="progress-bar progress-bar-success">
                                    <?php echo $register_student_number . '/' . $course['Course']['max_enroll_number']; ?>

                                </div>
                            </div>
                        </td>
                        <td>
                            <?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
                        </td>
                         <td><?php echo h($course['Course']['max_enroll_number']); ?>&nbsp;</td>
                        <td><?php echo h($course['Course']['register_student_number']); ?>&nbsp;</td>
                        <td><?php echo h($course['Course']['is_published']); ?>&nbsp;</td>
                        <td><?php echo h($course['Course']['enrolling_expiry_date']); ?>&nbsp;</td>
                        <td><?php echo h($course['Course']['created']); ?>&nbsp;</td>

                        <td class="tools">

                            <?php echo $this->Html->link('
  <span class="fa fa-edit"></span>', array('action' => 'edit', $course['Course']['id']), array('escape' => false)); ?>

                            <?php
                            //echo $status;
                            if (isset($status) && $status != COURSE_UNCOMPLETED && $status != COURSE_COMPLETED) {
                                echo $this->Form->postLink('                                
  <span class="fa fa-play"></span>', array('action' => 'open', $course['Course']['id']), array('escape' => false), __('Bạn có chắc mở khóa học # %s?', $course['Course']['name'] . ' - ' . $course['Chapter']['name']));
                            }
                            ?>     

                            <?php
                            if (isset($status) && $status != COURSE_CANCELLED) {
                                echo $this->Form->postLink('<span class="fa fa-ban"></span>', array('fields_manager' => false, 'action' => 'huy', $course['Course']['id']), array('escape' => false), __('Bạn có chắc hủy khóa học # %s?', $course['Course']['name'] . ' - ' . $course['Chapter']['name']));
                            }
                            ?>

                            <?php
                            if (isset($status) && $status == COURSE_CANCELLED) {
                                echo $this->Form->postLink('
                                
  <span class="fa fa-refresh"></span>', array('fields_manager' => false, 'action' => 'uncancel', $course['Course']['id']), array('escape' => false), __('Bạn có chắc phục hồi khóa học # %s?', $course['Course']['name'] . ' - ' . $course['Chapter']['name']));
                            }
                            ?>

                            <?php
                            //echo $this->Form->postLink('<span class="fa fa-trash-o"></span>', array('action' => 'delete', $course['Course']['id']), array('escape' => false), __('Bạn có chắc xóa khóa học # %s?', $course['Course']['name'] . ' - ' . $course['Chapter']['name']));
                            ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p>
                <?php
                echo $this->Paginator->counter(array(
                    'format' => __('Trang {:page} của {:pages} trang, hiển thị {:current} của {:count} tất cả, bắt đầu từ {:start}, đến {:end}')
                ));
                ?>	
            </p>
            <?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
        </div>
        <div class="box-footer" style="text-align: right;">
            <?php echo $this->Html->link('Thêm mới', array('action' => 'add'), array('class' => 'btn btn-success')); ?>

        </div>
    </div>
</div>



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
                    <th><?php echo $this->Paginator->sort('created_user_id', 'Người tạo'); ?></th>

                    <th class="actions">Thao tác</th>
                </tr>
                <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>

                <?php foreach ($courses as $course): ?>

                    <tr>
                        <th><?php echo $stt++; ?></th>

                        <td>
                            <?php
                            echo $this->Html->link($course['Course']['name'], array('admin' => true, 'controller' => 'courses', 'action' => 'view', $course['Course']['id']));
                            $register_student_number = $course['Course']['register_student_number'];
                            if ($course['Course']['max_enroll_number'] > 0) {
                                $percent = round(($register_student_number * 100) / $course['Course']['max_enroll_number']);
                            } else {
                                $percent = 0;
                            }
                            ?>
                            <?php if ($course['Course']['status'] != COURSE_COMPLETED): ?>
                                <div class="progress progress-bar-yellow progress-striped">
                                    <div style="width: <?php echo $percent; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $percent; ?>" role="progressbar" class="progress-bar progress-bar-success">
                                        <?php echo $register_student_number . '/' . $course['Course']['max_enroll_number']; ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                        <td>
                            <?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
                        </td>
                        <td><?php echo h($course['Course']['max_enroll_number']); ?>&nbsp;</td>
                        <td><?php echo h($course['Course']['register_student_number']); ?>&nbsp;</td>
                        <td><?php
                            if ($course['Course']['is_published'] == 1)
                                echo 'Có';
                            else
                                echo 'Không'
                                ;
                            ?>&nbsp;</td>
                        <td><?php
                            $enrolling_expiry_date = new DateTime($course['Course']['enrolling_expiry_date']);
                            echo $enrolling_expiry_date->format('H:i') . ', ngày: ' . $enrolling_expiry_date->format('d/m/Y');
                            ?>&nbsp;</td>
                        <td><?php
                            $created = new DateTime($course['Course']['created']);
                            echo $created->format('H:i') . ', ngày: ' . $created->format('d/n/Y');
                            ?>&nbsp;</td>
                        <td><?php echo h($course['User']['name']); ?>&nbsp;</td>

                        <td class="tools">

                            <?php echo $this->Html->link('
  <span class="fa fa-edit"></span>', array('action' => 'edit', $course['Course']['id']), array('escape' => false));
                            ?>
                            <?php
                            if (isset($status) && $status == COURSE_COMPLETED) {
                                echo $this->Html->link('<span> <i class="glyphicon glyphicon-tower"></i>    </span>', array('admin' => true, 'action' => 'score', $course['Course']['id']), array('escape' => false));
                            }
                            ?>
                            <?php
                            if (isset($status) && $status != COURSE_UNCOMPLETED && $status != COURSE_COMPLETED) {
                                echo $this->Form->postLink('                                
  <span class="fa fa-play"></span>', array('action' => 'open', $course['Course']['id']), array('escape' => false), __('Bạn có chắc mở khóa học # %s?', $course['Course']['name'] . ' - ' . $course['Chapter']['name']));
                            }
                            ?>     

                            <?php
                            if (isset($status) && $status != COURSE_CANCELLED) {
                                echo $this->Form->postLink('
                                
  <span class="fa fa-ban"></span>', array('admin' => false, 'action' => 'huy', $course['Course']['id']), array('escape' => false), __('Bạn có chắc hủy khóa học # %s?', $course['Course']['name'] . ' - ' . $course['Chapter']['name']));
                            }
                            ?>

                            <?php
                            if (isset($status) && $status == COURSE_CANCELLED) {
                                echo $this->Form->postLink('
                                
  <span class="fa fa-refresh"></span>', array('admin' => false, 'action' => 'uncancel', $course['Course']['id']), array('escape' => false), __('Bạn có chắc phục hồi khóa học # %s?', $course['Course']['name'] . ' - ' . $course['Chapter']['name']));
                                echo $this->Form->postLink('<span class="fa fa-trash-o"></span>', array('admin'=>false,'action' => 'delete', $course['Course']['id']), array('escape' => false), __('Bạn có chắc xóa khóa học # %s?', $course['Course']['name'] . ' - ' . $course['Chapter']['name']));
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
            ?>	</p>
            <?php
            echo $this->Paginator->pagination(array(
                'ul' => 'pagination'
            ));
            ?>
        </div>
        <div class="box-footer" style="text-align: right;">
<?php echo $this->Html->link('Thêm mới', array('action' => 'add'), array('class' => 'btn btn-success')); ?>

        </div>
    </div>
</div>



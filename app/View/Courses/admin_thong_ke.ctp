<?php
$this->Html->addCrumb('Khóa học đăng đăng ký', '/chapters/index/1');
$this->Html->addCrumb('Thêm khóa học');
?>
<div class="col-lg-12 well">
    <?php
    echo $this->Form->create('Course', array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'url' => array('action' => 'thong_ke', 'admin' => true),
        'class' => 'form-horizontal'
    ));
    ?>
    <fieldset>
        <legend>Thống kê Khóa học</legend>
        <?php
        echo $this->Form->input('field_id', array('label' => 'Lĩnh vực', 'empty' => '-- Tất cả --'));
        echo $this->Form->input('chapter_id', array('label' => 'Chuyên đề', 'empty' => '-- Tất cả --', 'required' => false));
        echo $this->Form->input('status', array('label' => 'Tình trạng', 'type' => 'select', 'options' => array(
                COURSE_COMPLETED => 'Đã cập nhật điểm hoàn chỉnh',
                COURSE_UNCOMPLETED => 'Chưa cập nhật điểm hoàn chỉnh',
                COURSE_CANCELLED => 'Đã hủy'
            ), 'empty' => '-- Tất cả --','required' => false));
        echo $this->Form->input('teacher_id', array('label' => 'Tập huấn bởi', 'empty' => '-- Tất cả --'));
        echo $this->Form->input('begin', array('label' => 'Từ ', 'type' => 'date', 'class' => false, 'dateFormat' => 'DMY', 'monthNames' => false, 'empty' => true, 'minYear' => 2010));
        echo $this->Form->input('end', array('label' => 'Đến ', 'type' => 'date', 'class' => false, 'dateFormat' => 'DMY', 'monthNames' => false, 'empty' => true, 'minYear' => 2010));
        ?>
    </fieldset>
    <?php echo $this->Form->button('Thực hiện', array('type' => 'submit', 'class' => 'btn btn-info')) ?>
    <?php echo $this->Form->end(); ?>
</div>

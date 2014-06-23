<?php
echo $this->element('Common/tinymce');
$this->Html->addCrumb('Khóa học đăng đăng ký', '/chapters/index/1');
$this->Html->addCrumb('Sửa khóa học '.$this->Form->value('name'));
?>
<div class="col-lg-10 well">
    <?php
    echo $this->Form->create('Course', array(
        'type' => 'file',
        'inputDefaults' => array(
            'div' => 'form-group',
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'class' => 'well'
    ));
    ?>
    <fieldset>
        <legend>Cập nhật khóa học</legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name', array('label' => 'Tên khóa'));
        echo $this->Form->input('chapter_id', array('label' => 'Chủ đề'));
        echo $this->Form->input('image', array('label' => 'Ảnh đại diện', 'type' => 'file', 'class' => false));
        echo $this->Form->input('image_path', array('type' => 'hidden'));
        echo $this->Form->input('teacher_id', array('label' => 'Tập huấn bởi'));
        echo $this->Form->input('max_enroll_number', array('label' => 'Số người tối đa'));
        echo $this->Form->input('is_published', array('label' => 'Xuất bản'));
        echo $this->Form->input('enrolling_expiry_date', array('label' => 'Ngày hết hạn đăng ký: ', 'class' => 'input datetime','dateFormat' => 'DMY', 'monthNames' => false));
        echo $this->Form->input('decription', array('label' => 'Miêu tả'));
        ?>
    </fieldset>
    <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-info')) ?>
<?php echo $this->Html->link('Back', array('action' => 'index', 1), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
<?php echo $this->Form->end(); ?>
</div>

<?php
$this->Html->addCrumb('Khóa học đang đăng ký', '/chapters/index/1');
$this->Html->addCrumb('Thống kê người tham dự');
?>

<div class="col-lg-12 well">
    <?php
    echo $this->Form->create('Course', array(
        'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well',
        'url' => array('controller'=>'students_courses','action' => 'thong_ke_student', 'manager' => true),
        'id' => 'thong_ke_form'
    ));
    ?>
    <fieldset >
        <legend>Thống kê người tham dự</legend>
        <?php
        echo $this->Form->input('Student.department_id', array('label' => 'Đơn vị', 'empty' => '-- Tất cả --'));
        echo $this->Form->input('StudentsCourse.ket_qua', array('label' => 'Kết quả', 'options'=>array('empty'=>'-- Tất cả --','1'=>'Đạt','0'=>'Không đạt')));
        echo $this->Form->input('field_id', array('label' => 'Lĩnh vực', 'empty' => '-- Tất cả --'));
        echo $this->Form->input('chapter_id', array('label' => 'Chuyên đề', 'empty' => '-- Tất cả --', 'required' => false));
        echo $this->Form->input('status', array('label' => 'Tình trạng', 'type' => 'select', 'options' => array(
                COURSE_COMPLETED => 'Đã hoàn thành',
                COURSE_UNCOMPLETED => 'Chưa hoàn thành',
                COURSE_CANCELLED => 'Đã hủy'
            ), 'empty' => '-- Tất cả --', 'required' => false));
        echo $this->Form->input('teacher_id', array('label' => 'Tập huấn bởi', 'empty' => '-- Tất cả --'));
        echo $this->Form->input('begin', array('label' => 'Từ ', 'type' => 'date', 'class' => false, 'dateFormat' => 'DMY', 'monthNames' => false, 'empty' => true, 'minYear' => 2010));
        echo $this->Form->input('end', array('label' => 'Đến ', 'type' => 'date', 'class' => false, 'dateFormat' => 'DMY', 'monthNames' => false, 'empty' => true, 'minYear' => 2010));
        ?>
    </fieldset>
    <?php echo $this->Form->button('Thực hiện', array('type' => 'submit', 'class' => 'btn btn-info')) ?>
    <?php echo $this->Form->end(); ?>
</div>
<script>

    $(function() {
        var fieldbox = $('#CourseFieldId');
        var chapterbox = $('#CourseChapterId');
        fieldbox.change(function() {
            var field_id = (this.value);
            $.ajax({
                url: "<?php echo SUB_DIR; ?>/chapters/fill_selectbox/" + field_id + ".json"
            })
                    .done(function(data) {
                        chapterbox.empty();
                        $.each(data, function(i, value) {
                            $.each(value, function(index, text) {
                                chapterbox.append($('<option>').text(text).attr('value', index));
                            });

                        });
                    });
        });
    });
</script>
<?php
$this->Html->addCrumb('Khóa học đang đăng ký', '/chapters/index/1');
$this->Html->addCrumb('Thống kê người tham dự');
echo $this->Html->script('jquery.form');
?>

<div class="col-lg-12 well">
    <?php
    echo $this->Form->create('Course', array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => false,
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'class' => 'form-inline',
        'url' => array('controller' => 'attends', 'action' => 'thong_ke_student', 'manager' => true),
        'id' => 'thong_ke_form'
    ));
    ?>
    <fieldset >
        <legend>Thống kê người tham dự</legend>
        <?php
        echo $this->Form->input('Student.department_id', array('empty' => '-- Chọn đơn vị --'));
        echo $this->Form->input('Attend.is_passed', array('type'=>'select','empty' => '-- Kết quả --','required'=>false,'options' => array( '1' => 'Đạt', '0' => 'Không đạt')));
        echo $this->Form->input('field_id', array('empty' => '-- Chọn lĩnh vực --'));
        echo $this->Form->input('chapter_id', array('empty' => '-- Chọn chuyên đề --', 'required' => false));
        echo $this->Form->input('status', array('type' => 'select', 'options' => array(
                COURSE_COMPLETED => 'Đã hoàn thành',
                COURSE_UNCOMPLETED => 'Chưa hoàn thành',
                COURSE_CANCELLED => 'Đã hủy'
            ), 'empty' => '-- Chọn tình trạng --', 'required' => false));
        echo $this->Form->input('teacher_id', array('empty' => '-- Tập huấn bởi --'));
        echo $this->Form->input('begin', array('label' => 'Từ ', 'type' => 'date', 'dateFormat' => 'DMY', 'monthNames' => false, 'empty' => true, 'minYear' => 2010));
        echo $this->Form->input('end', array('label' => 'Đến ', 'type' => 'date', 'dateFormat' => 'DMY', 'monthNames' => false, 'empty' => true, 'minYear' => 2010));
        ?>
    </fieldset>
    <?php echo $this->Form->submit('Thực hiện', array('class' => 'btn btn-info')) ?>
    <?php echo $this->Form->end(); ?>
</div>
<div class="col-xs-12">

    <div class="box">
        <div class="box-header">
            <h3>Kết quả thống kê</h3>
        </div>
        <div class="box-body table-responsive no-padding" id="ket_qua">

        </div>


    </div>
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

        $('#thong_ke_form').on('submit', function(e) {
            e.preventDefault(); // prevent native submit
            $('#ket_qua').parent().append('<div class="overlay"></div><div class="loading-img"></div>');
            $(this).ajaxSubmit({
                url: '<?php echo SUB_DIR; ?>/manager/attends/thong_ke_student',
                success: response
            });
            return false;
        });
// post-submit callback 
        function response(responseText, statusText, xhr, $form) {

            $('.overlay').remove();
            $('.loading-img').remove();
            console.log(responseText);
            $('#ket_qua').html(responseText);
            return true;
        }
    });
</script>
<script>
    $(document).ready(function() {
        $("#StudentDepartmentId").select2();
        $("#CourseChapterId").select2();
        $("#CourseTeacherId").select2();
    });
</script>
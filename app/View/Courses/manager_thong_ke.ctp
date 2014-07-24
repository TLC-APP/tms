<?php
$this->Html->addCrumb('Dashboard', "/" . SUB_DIR);
$this->Html->addCrumb('Thống kê khóa học');
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
        'url' => array('action' => 'thong_ke', 'manager' => true),
        'class' => 'form-inline',
        'id' => 'thong_ke_form'
    ));
    ?>
    <fieldset>
        <legend>Thống kê theo</legend>
        <?php
        echo $this->Form->input('field_id', array('empty' => '-- Lĩnh vực --'));
        echo $this->Form->input('chapter_id', array('empty' => '-- Chuyên đề --', 'required' => false));
        echo $this->Form->input('status', array('empty' => '-- Tình trạng --', 'type' => 'select', 'options' => array(
                COURSE_COMPLETED => 'Đã hoàn thành',
                COURSE_UNCOMPLETED => 'Chưa hoàn thành',
                COURSE_CANCELLED => 'Đã hủy'
            ), 'empty' => '-- Tất cả --', 'required' => false));
        echo $this->Form->input('teacher_id', array('empty' => '-- Tập huấn bởi --'));
        echo $this->Form->input('begin', array('label' => 'Từ ', 'type' => 'date', 'dateFormat' => 'DMY', 'monthNames' => false, 'empty' => true, 'minYear' => 2010));
        echo $this->Form->input('end', array('label' => 'Đến ', 'type' => 'date', 'dateFormat' => 'DMY', 'monthNames' => false, 'empty' => true, 'minYear' => 2010));
        ?>
    </fieldset>
    <?php echo $this->Form->submit('Thực hiện', array('div' => 'form-group','class'=>"btn btn-info")); ?>
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
        $('#thong_ke_form').on('submit', function(e) {

            e.preventDefault(); // prevent native submit
            $('#ket_qua').parent().append('<div class="overlay"></div><div class="loading-img"></div>');
            $(this).ajaxSubmit({
                url: '<?php echo SUB_DIR; ?>/manager/courses/thong_ke',
                success: response
            });
            return false;
        });
// post-submit callback 
        function response(responseText, statusText, xhr, $form) {

            $('.overlay').remove();
            $('.loading-img').remove();

            $('#ket_qua').html(responseText);
            return true;
        }
    });
</script>
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
    $(document).ready(function() {
        $("#CourseChapterId").select2();
        $("#CourseTeacherId").select2();
    });
</script>


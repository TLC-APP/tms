<?php
echo $this->Html->script('jquery.form');
?>
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- search form -->
        <?php
        echo $this->Form->create('Course', array(
            'inputDefaults' => array(
                'div' => 'form-group',
                'label' => false,
                'wrapInput' => false,
                'class' => 'form-control'
            ),
            'url' => array('action' => 'thong_ke', 'manager' => true),
            'class' => 'sidebar-form',
            'id' => 'thong_ke_form'
        ));
        ?>
        <fieldset>
            <legend><h3>Thống kê theo</h3></legend>
            <?php
            echo $this->Form->input('department_id', array('options' => $donVis, 'escape' => false));
            echo $this->Form->input('user_id', array('empty' => '-- Tên người tham gia --', 'options' => $users));

            echo $this->Form->input('field_id', array('empty' => '-- Lĩnh vực --', 'options' => $fields));
            echo $this->Form->input('chapter_id', array('empty' => '-- Chuyên đề --', 'required' => false));
            echo $this->Form->input('teacher_id', array('empty' => '-- Tập huấn bởi --'));
            echo $this->Form->input('status', array('empty' => '-- Tình trạng khóa--', 'type' => 'select', 'options' => array(
                    COURSE_REGISTERING => 'Đang đăng ký',
                    COURSE_COMPLETED => 'Đã hoàn thành',
                    COURSE_UNCOMPLETED => 'Chưa hoàn thành',
                    COURSE_CANCELLED => 'Đã hủy'
                ), 'required' => false));


//echo $this->Form->input('begin', array('label' => 'Từ ', 'type' => 'date', 'dateFormat' => 'DMY', 'monthNames' => false, 'empty' => true, 'minYear' => 2010));
            //echo $this->Form->input('end', array('label' => 'Đến ', 'type' => 'date', 'dateFormat' => 'DMY', 'monthNames' => false, 'empty' => true, 'minYear' => 2010));
            ?>
            <div class="form-group">
                <label>Khoảng thời gian:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="data[khoang_thoi_gian]" class="form-control pull-right" id="reservation"/>

                </div><!-- /.input group -->
                <?php echo $this->Form->button('<i class="fa fa-search"></i>', array('type' => 'submit', 'div' => 'form-group', 'class' => "btn btn-success pull-right", 'escape' => false)); ?>

        </fieldset>


        <?php echo $this->Form->end(); ?>
        <!-- /.search form -->
    </section>
    <!-- /.sidebar -->

</aside>
<script>
    $(function() {
        $("#CourseChapterId").select2();
        $("#CourseTeacherId").select2();
        $("#CourseFieldId").select2();
        $("#CourseStatus").select2();
        $("#CourseDepartmentId").select2();
        $("#CourseUserId").select2();

        //Date range picker
        $('#reservation').daterangepicker(
                {
                    showDropdowns: true,
                    format: 'YYYY/MM/DD'
                });

        $('#thong_ke_form').on('submit', function(e) {

            e.preventDefault(); // prevent native submit
            $('#ket_qua').parent().append('<div class="overlay"></div><div class="loading-img"></div>');
            $(this).ajaxSubmit({
                url: '<?php echo SUB_DIR; ?>/truongdonvi/dashboards/home',
                success: response
            });
            return false;
        });
        function response(responseText, statusText, xhr, $form) {

            $('.overlay').remove();
            $('.loading-img').remove();

            $('#ket_qua').html(responseText);
            return true;
        }

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

        /**/
        var department_div = $('#CourseDepartmentId');
        var user_div = $('#CourseUserId');
        department_div.change(function() {
            user_div.empty();
            var department_id = (this.value);
            $.ajax({
                url: "<?php echo SUB_DIR; ?>/users/fill_selectbox/" + department_id + ".json"
            })
                    .done(function(data) {

                        $.each(data, function(i, value) {
                            $.each(value, function(index, text) {
                                user_div.append($('<option>').text(text).attr('value', index));
                            });

                        });
                    });
        });
    });
</script>
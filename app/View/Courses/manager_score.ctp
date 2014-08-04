<div class="col-lg-12 content-right">
    <div class="row">
        <h3 class="page-header">Kết quả khóa học: <?php echo $course['Course']['name'] ?> </h3>
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab_hoc_vien">Học viên</a></li>
                    <li class=""><a data-toggle="tab" href="#thongtin">Thông tin</a></li>
                </ul>
                <div class="tab-content ">
                    <div id="tab_hoc_vien" class="tab-pane active">

                        <?php echo $this->Form->create(null, array('url' => array('controller' => 'courses', 'action' => 'update_score', $course['Course']['id'])));
                        ?>
                        <table class="table table-hover">
                            <thead>
                            <th>#</th>
                            <th>Họ tên</th>
                            <th>Ngày đăng ký</th>
                            <th><div class="selectallinput">
                                <label for="select-all">Đạt</label>
                                <input type="checkbox" id="select-all">
                            </div></th>
                            <th>Số chứng nhận</th>
                            <th>Ngày cấp</th>
                            <th>Đã nhận</th>
                            </thead>
                            <tbody class="inputs" id="check_zone">

                                <?php
                                $students = $course['Attend'];
                                $stt = 1;

                                foreach ($students as $student):
                                    ?>
                                    <tr>
                                        <td><?php echo $stt++; ?></td>
                                        <td><?php echo $student['Student']['name']; ?></td>
                                        <td><?php echo $student['created']; ?></td>
                                        <td>
                                            <input type="checkbox" class ="pass" name="pass_students[]" value="<?php echo $student['Student']['id'] ?>"
                                            <?php
                                            if ($student['is_passed']) {
                                                echo 'checked="checked">';
                                                echo ' <input class= "fails" type="hidden" name="fail_students[]" value="0">';
                                            } else {
                                                echo '>';
                                                echo ' <input class= "fails" type="hidden" name="fail_students[]" value="' . $student['Student']['id'] . '">';
                                            }
                                            ?>

                                        </td>
                                        <td><?php echo $student['certificated_number']; ?></td>

                                        <td>
                                            <?php
                                            if (!empty($student['certificated_date'])) {
                                                $certificated_date = new DateTime($student['certificated_date']);
                                                echo $certificated_date->format('d.m.Y');
                                            }
                                            ?></td>
                                        <td><?php echo $student['is_recieved']; ?></td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <div class="btn-toolbar pull-right">
                            <?php echo $this->Form->end('Lưu'); ?>
                            <?php echo $this->Html->link('Xuất excel', array('manager' => true, 'action' => 'xuat_so_chung_nhan', $course['Course']['id']), array('class' => 'btn btn-info')); ?>
                        </div>
                        </form>
                    </div><!-- /.tab-pane -->
                    <div id="thongtin" class="tab-pane">
                        <table class="table table-condensed">
                            <tbody style="font-size: 15px;">
                                <tr>
                                    <td>Đạt</td>
                                    <td>                 
                                        <?php echo $course['Course']['pass_number'] . '/' . count($course['Attend']); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Chuyên đề</td>
                                    <td>                 
                                        <?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
                                    </td>
                                </tr>
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
                                        <span class="text-red"><?php echo $course['Course']['enrolling_expiry_date']; ?></span>
                                    </td>
                                </tr>
                                <tr><td>Đã xuất bản</td><td><?php echo $course['Course']['is_published']; ?></td></tr>
                                <tr><td> Tình trạng</td><td><?php echo $course['Course']['status']; ?></td></tr>

                            </tbody>
                        </table>
                    </div><!-- /.tab-pane -->


                </div><!-- /.tab-content -->
            </div>

        </div>
    </div>
    <hr>
</div>
<script language="javascript">

    function selectAll(wrapperAll, wrapperInputs) {

        var selectAll = wrapperAll.find('input');
        var allInputs = wrapperInputs.find('input');
        function checkitems(allInputs) {
            //If all items checked
            if (allInputs.filter(':not(:checked)').length === 0) {


                selectAll.attr('checked', true);

            } else {
                console.log('Function: checkItems: Else all items checked');
                selectAll.attr('checked', false);
            }
        }

        checkitems(allInputs);
        allInputs.on('change', function() {
            checkitems(allInputs)
        });

        selectAll.on('change', function() {
            if (this.checked) {
                console.log('This checkbox is checked');
                wrapperInputs.find(':checkbox').attr('checked', true);

            } else {
                console.log('This checkbox is NOT checked');
                wrapperInputs.find(':checkbox').attr('checked', false);

            }
        });

    }

    $(function() {

        var wrapperAll = $('.selectallinput');
        var wrapperInputs = $('.inputs');

        selectAll(wrapperAll, wrapperInputs);
        $("#check_zone .pass").click(function() {
            
            var next=$(this).next();
            if($(this).attr('checked')=='checked'){
                this.value=next.attr('value');
                next.attr('value',0);
            }else{
                next.attr('value',this.value);
                this.value=0;
            }

        });
    });
</script>
<?php //debug($courses);  ?>
<table class="table-hover table">
    <tr>
        <th>STT</th>
        <th>Tên khóa</th>
        <th>Chuyên đề</th>
        <th>Tập huấn bởi</th>
        <th>Ngày tạo</th>
        <th>Đăng ký tối đa</th>
        <th>Đã đăng ký</th>
        <th>Tình trạng</th>
        <th>Hạn đăng ký</th>

    </tr>
    <?php $stt = 0; ?>

    <?php foreach ($courses as $course): ?>

        <tr data-toggle="collapse" data-target=".demo<?php echo $stt; ?>" class="accordion-toggle">
            <th><?php echo $stt + 1; ?></th>

            <td>
                            

                <?php
                echo $this->Html->link($course['Course']['name'], array('truongdonvi' => true, 'controller' => 'courses', 'action' => 'view', $course['Course']['id']),array('class' => 'add-button fancybox.ajax'));
                $register_student_number = $course['Course']['register_student_number'];
                if ($course['Course']['max_enroll_number'] > 0) {
                    $percent = round(($register_student_number * 100) / $course['Course']['max_enroll_number']);
                } else {
                    $percent = 0;
                }
                ?>

            <td>
                <?php echo $course['Chapter']['name']; ?>
            </td>
            
            <td>
                <?php echo $this->Html->link($course['Teacher']['name'], array('teacher'=>true,'controller' => 'users', 'action' => 'profile', $course['Teacher']['id']),array('class' => 'add-button fancybox.ajax')); ?>
            </td>
            <td><?php echo h($course['Course']['created']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['max_enroll_number']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['register_student_number']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['status']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['enrolling_expiry_date']); ?>&nbsp;</td>

        </tr>
        <tr>
            <td class="hiddenRow" colspan="8">
                <table class=" table accordian-body collapse demo<?php echo $stt; ?>">
                    <thead>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Đơn vị</th>
                    <th>Ngày đăng ký</th>                    
                    <th>Kết quả</th>
                    </thead>
                    <tbody>
                        <?php
                        $astt = 1;
                        foreach ($course['Attend'] as $attent):
                            ?>
                            <tr>
                                <td>
                                    <?php echo $astt++; ?>

                                </td>
                                <td>
                                    <?php echo $attent['Student']['name']; ?>

                                </td>
                                
                                <td>
                                    <?php echo $attent['Student']['Department']['name']; ?>

                                </td>
                                <td>
                                    <?php echo $attent['created']; ?>

                                </td>
                                <td>
                                    <?php
                                    if (is_null($attent['is_passed'])) {
                                        echo 'Chưa có kết quả';
                                    } else {
                                        if ($attent['is_passed'])
                                            echo 'Đạt';
                                        else
                                            echo 'Không đạt';
                                    }
                                    ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <?php
        $stt++;
    endforeach;
    ?>
</table>
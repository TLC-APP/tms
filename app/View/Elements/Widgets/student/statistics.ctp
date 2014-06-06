<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class=" glyphicon glyphicon-bullhorn"></i> Thông báo từ hệ thống</h3>
    </div>
    <div class="panel-body">
        <table>
            <?php foreach ($courses_notification as $course_notification): ?>
                <tr>
                    <td><?php if($course_notification['StudentsCourse']['is_passed']==1&&$course_notification['StudentsCourse']['is_recieved']==0)
                    {
                        echo "<i class='fa fa-hand-o-right'>"."</i>"; echo " Đã có chứng nhận khóa "; echo $course_notification['Course']['name'];
                        
                    }   ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>
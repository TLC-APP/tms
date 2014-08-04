<?php foreach ($courses_completed as $course_completed): ?>
    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
        <div class="album-cover">
            <?php
            echo $this->Html->link(
                    $this->Html->image('/files/course/image/' . $course_completed['Course']['image_path'] . '/' . h($course_completed['Course']['image']), array('class' => "img-responsive img-thumbnail", 'style' => "width: 300px; height: 200px;")), array('guest' => true, 'controller' => 'courses', 'action' => 'view', $course_completed['Course']['id']), array('escape' => false, 'class' => ' prettyphoto add-button fancybox.ajax')
            );
            ?>
        </div>
        <div class="desc">
            <h4><small><a href="#"><?php echo $course_completed['Course']['name'] ?></a></small></h4>

        </div>
    </div>
<?php endforeach; ?>
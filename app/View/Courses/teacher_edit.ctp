 <?php 
 foreach ($courses_edit as $course_edit): ?>
<div class="col-lg-12 well">
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
        echo $this->Form->input('id',array('type' => 'hidden'));
        echo $this->Form->input('name',array('type' => 'hidden'));
        echo $this->Form->input('chapter_id',array('type' => 'hidden'));
        echo $this->Form->input('teacher_id',array('type' => 'hidden'));
        echo $this->Form->input('max_enroll_number',array('type' => 'hidden'));
        echo $this->Form->input('is_published', array('type' => 'hidden'));
        echo $this->Form->input('enrolling_expiry_date',array('type' => 'hidden'));
        
        echo $this->Form->input('image', array('label' => 'Ảnh đại diện', 'type' => 'file', 'class' => false));
        echo $this->Form->input('image_path', array('type' => 'hidden'));
        echo $this->Form->input('decription', array('label' => 'Miêu tả'));
        ?>
    </fieldset>
    <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-info')); echo "&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
<?php echo $this->Html->link('Back', array('action' => 'view1',$course_edit['id']), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
<?php echo $this->Form->end(); ?>
</div>
 <?php endforeach; ?>
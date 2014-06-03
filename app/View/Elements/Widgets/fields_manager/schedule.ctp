<?php
echo $this->Html->script('jquery.form', array('inline' => false));
echo $this->Html->css('/jquery.qtip.custom/jquery.qtip.min', array('inline' => false));
echo $this->Html->script('/jquery.qtip.custom/jquery.qtip.min', array('inline' => false));
echo $this->Html->script('jquery.minicolors.min', array('inline' => false));
echo $this->Html->css('jquery.minicolors', array('inline' => false));
?>
<div id='message'></div>
<div class="row">

    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header">
                <h4 class="box-title">Buổi</h4>
            </div>
            <div class="box-body">
                <!-- the events -->
                <div id='external-events'>  
                    <?php
                    foreach ($course['CoursesRoom'] as $buoi):
                        if (empty($buoi['start'])) {
                            ?>

                            <div class='external-event' style="color: #fff ;background-color: <?php echo $buoi['color']; ?>" 
                                 data-id='<?php echo $buoi['id']; ?>' 
                                 data-room='<?php echo $buoi['Room']['name']; ?>' 
                                 data-room_id='<?php echo $buoi['room_id']; ?>'
                                 data-title='<?php echo $buoi['title']; ?>' 
                                 data-priority='<?php echo $buoi['priority']; ?>' 
                                 data-color='<?php echo $buoi['color']; ?>'
                                 > 
                            <?php echo $buoi['title']; ?>
                            </div>                    
    <?php } endforeach; ?>

                </div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Thêm - Sửa - Xóa buổi học</h3>    
            </div>
            <div class="box-body">
<?php echo $this->Form->create('CoursesRoom', array('id' => 'addBuoiForm')); ?>  

                <label for="hue-demo">Màu nền</label>
                <input type="text" id="txt_background_color" class="form-control demo" data-control="hue" name="data[CoursesRoom][color]" value="#ff6161">
                <?php echo $this->Form->input('title', array('label' => false, 'id' => 'new-event', 'class' => 'form-control', 'placeholder' => "Tên buổi, vd: buổi 1, buổi 2")); ?>
                <?php echo $this->Form->input('priority', array('label' => false, 'id' => 'pri-event', 'class' => 'form-control', 'placeholder' => "Thứ tự học, ví dụ: 1, 2, 3")); ?>
                    <?php echo $this->Form->input('current_event_id', array('id' => 'txt_current_event', 'type' => 'hidden')); ?>
                <div class="input-group">
<?php echo $this->Form->input('room_id', array('label' => false, 'div' => false, 'id' => 'room-event', 'class' => 'form-control', 'empty' => "Chọn phòng..")); ?>
                    <span class="input-group-addon"><a href="/rooms/add" class="fancybox.ajax add-button"><i class="glyphicon glyphicon-plus"></i></a></span>
                </div>

            </div>
            <div class="box-footer">
                <div class="btn-toolbar">
                    <button id="add-new-event" type="button" class="btn btn-info btn-sm"><span class="fa fa-plus"></span></button>
                    <button id="edit-event" type="button" class="btn btn-success btn-sm" ><span class="fa fa-pencil"></span></button>
                    <button id="save-event" type="submit" class="btn bg-navy btn-sm"><span class="fa fa-save"></span></button>
                    <button id="delete-event" type="button" class="btn btn-danger btn-sm"><span class="fa  fa-trash-o"></span></button>
                    <button id="cancel-event" type="button" class="btn btn-warning btn-sm"><span class="fa fa-times"></span></button>
                </div>

<?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div><!-- /.col -->
    <div class="col-md-9">
        <div class="box box-primary">                                
            <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div><!-- /.col -->
</div><!-- /.row -->  
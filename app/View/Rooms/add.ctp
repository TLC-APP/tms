<div class="rooms form">
    <?php echo $this->Html->script('jquery.form');?>
    <div id='message'></div>
    <?php
    echo $this->Form->create('Room', array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => array(
                'class' => 'col col-sm-3 control-label'
            ),
            'wrapInput' => 'col col-sm-7',
            'class' => 'form-control'
        ),
        'class' => 'well form-horizontal',
        'id' => 'addRoomForm'
    ));
    ?>
    <fieldset>
        <legend>Thêm phòng học</legend>
        <?php
        echo $this->Form->input('name',array('label' => 'Tên phòng'));
        echo $this->Form->input('decription',array('label' => 'Miêu tả'));
        ?>
    </fieldset>
<?php echo $this->Form->end('Lưu'); ?>
</div>
<script>
    $(function() {
        $('#addRoomForm').on('submit', function(e) {
            e.preventDefault(); // prevent native submit
            $(this).ajaxSubmit({
                url: '<?php echo SUB_DIR;?>/rooms/add.json',
                success: addRoomResponse
            });
            return false;
        });
    });

// post-submit callback 
    function addRoomResponse(responseText, statusText, xhr, $form) {
        if (responseText.response.status) {
            $('#room-event').append('<option value="' + responseText.response.id + '" selected="selected">' + responseText.response.name + '</option>');
            $.fancybox.close();
        } else {
            $('#message').html(responseText.response.message);
        }
        return true;
    }
</script>
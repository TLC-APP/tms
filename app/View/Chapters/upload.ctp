<?php echo $this->Html->script('jquery.form'); ?>
<div id='message'></div>
<div class="col-md-10">
    <?php
    echo $this->Form->create('Chapter', array(
        'url' => array('action' => 'upload', $this->Form->value('Chapter.id')),
        'type' => 'file',
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => array(
                'class' => 'col col-sm-2 control-label'
            ),
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        
        'id' => 'addTaiLieuForm'
            )
    );
    ?>
    <fieldset>
        <legend>Cập nhật tài liệu</legend>
        <?php
        echo $this->Form->input('id');
        echo $this->element('Common/dinh_kem', array('model' => 'Attachment'));
        ?>
    </fieldset>
    <div class="btn-toolbar" style="text-align: center;">
        <?php echo $this->Form->button('Tải lên', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>
    </div>
    <?php echo $this->Form->end(); ?>

</div>

<script>
    $(function() {
        $('#addTaiLieuForm').on('submit', function(e) {
            e.preventDefault(); // prevent native submit
            $(this).ajaxSubmit({                
                success: addTaiLieuResponse
            });
            return false;
        });
    });
// post-submit callback 
    function addTaiLieuResponse(responseText, statusText, xhr, $form) {        
        var response = JSON.parse(responseText);
        if (response.status === 1) {
            $.fancybox.close();
            $.ajax({
                type: "POST",
                url: '<?php echo SUB_DIR;?>/chapters/attachment_list/' + response.chapter_id
            }).done(function(data, textStatus, jqXHR) {
                $('#attachments_list').html(data);
            });
        } else {
            $('#message').html(responseText.response.message);
        }
        return true;
    }
</script>
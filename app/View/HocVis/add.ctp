<?php echo $this->Html->script('jquery.form');?>
<div id='message'></div>
<?php
echo $this->Form->create('HocVi', array(
    'inputDefaults' => array(
        'div' => 'form-group',
        'label' => array(
            'class' => 'col col-sm-3 control-label'
        ),
        'wrapInput' => 'col col-sm-7',
        'class' => 'form-control'
    ),
    'class' => 'well form-horizontal',
    'id' => 'addHocViForm'
));
?>
<fieldset>
    <legend>Thêm Học vị</legend>
    <?php
    echo $this->Form->input('name', array('label' => 'Tên'));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Lưu')); ?>

<script>
    $(function() {
        $('#addHocViForm').on('submit', function(e) {
            e.preventDefault(); // prevent native submit
            $(this).ajaxSubmit({
                url: '<?php echo Router::url('/',true)?>hoc_vis/add.json',
                success: addHocViResponse
            });
            return false;
        });
    });

// post-submit callback 
    function addHocViResponse(responseText, statusText, xhr, $form) {
        if (responseText.response.status) {
            $('#UserHocViId').append('<option value="' + responseText.response.id + '" selected="selected">' + responseText.response.name + '</option>');
            $.fancybox.close();
        } else {
            $('#message').html(responseText.response.message);
        }
        return true;
    }
</script>
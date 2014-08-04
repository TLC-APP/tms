<?php echo $this->Html->script('jquery.form'); ?>
<div id='message'></div>

<?php
echo $this->Form->create('HocHam', array(
    'inputDefaults' => array(
        'div' => 'form-group',
        'label' => array(
            'class' => 'col col-sm-3 control-label'
        ),
        'wrapInput' => 'col col-sm-7',
        'class' => 'form-control'
    ),
    'class' => 'well form-horizontal',
    'id'=>'addHocHamForm'
));
?>
<fieldset>
    <legend>Thêm học hàm</legend>
    <?php
    echo $this->Form->input('name', array('label' => 'Tên'));
    ?>
</fieldset>
<?php echo $this->Form->end('Lưu'); ?>

<script>
    $(function() {
        $('#addHocHamForm').on('submit', function(e) {
            e.preventDefault(); // prevent native submit
            $(this).ajaxSubmit({
                url: '<?php echo Router::url('/',true)?>hoc_hams/add.json',
                success: addHocHamResponse
            });
            return false;
        });
    });

// post-submit callback 
    function addHocHamResponse(responseText, statusText, xhr, $form) {
        if (responseText.response.status) {
            $('#UserHocHamId').append('<option value="' + responseText.response.id + '" selected="selected">' + responseText.response.name + '</option>');
            $.fancybox.close();
        } else {
            $('#message').html(responseText.response.message);
        }
        return true;
    }
</script>
<?php echo $this->Html->script('jquery.form'); ?>
<div id='message'></div>
<?php
echo $this->Form->create('Department', array(
    'inputDefaults' => array(
        'div' => 'form-group',
        'label' => array(
            'class' => 'col col-sm-3 control-label'
        ),
        'wrapInput' => 'col col-sm-7',
        'class' => 'form-control'
    ),
    'class' => 'well form-horizontal',
    'id' => 'addDepartmentForm'
));
?>
<fieldset>
    <legend>Thêm đơn vị</legend>
    <?php
    echo $this->Form->input('name', array('label' => 'Tên'));
    echo $this->Form->input('parent_id', array('label' => 'Đơn vị trên', 'required' => false, 'empty' => '-- chọn đơn vị trên --'));

    echo $this->Form->input('phone_number', array('label' => 'Số nội bộ'));
    echo $this->Form->input('decription', array('label' => 'Miêu tả'));
    ?>
</fieldset>
<?php echo $this->Form->end('Lưu'); ?>

<script>
    $(function() {
        $('#addDepartmentForm').on('submit', function(e) {
            e.preventDefault(); // prevent native submit
            $(this).ajaxSubmit({
                url: '<?php echo Router::url('/', true) ?>departments/add.json',
                success: addDepartmentResponse
            });
            return false;
        });
    });

// post-submit callback 
    function addDepartmentResponse(responseText, statusText, xhr, $form) {
        if (responseText.response.status) {
            $('#UserDepartmentId').append('<option value="' + responseText.response.id + '" selected="selected">' + responseText.response.name + '</option>');
            $.fancybox.close();
        } else {
            $('#message').html(responseText.response.message);
        }
        return true;
    }
</script>
<?php echo $this->Html->script('tinymce/tinymce.min'); ?>
<?php $this->TinymceElfinder->defineElfinderBrowser() ?>
<script>
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        fontsize_formats: "8pt 9pt 10pt 11pt 12pt 26pt 36pt",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor fontsizeselect emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ],
        file_browser_callback: elFinderBrowser,
        //selector: 'textarea'
    });
</script>
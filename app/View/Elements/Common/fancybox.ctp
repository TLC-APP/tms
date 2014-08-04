<!-- Add fancyBox -->
<?php
echo $this->Html->css('/fancybox/source/jquery.fancybox');
echo $this->Html->css('/fancybox/source/helpers/jquery.fancybox-buttons');
echo $this->Html->css('/fancybox/source/helpers/jquery.fancybox-thumbs');
echo $this->Html->script('/fancybox/source/jquery.fancybox.pack');
echo $this->Html->script('/fancybox/source/helpers/jquery.fancybox-buttons');
echo $this->Html->script('/fancybox/source/helpers/jquery.fancybox-media');
echo $this->Html->script('/fancybox/source/helpers/jquery.fancybox-thumbs');
?>
<script type = "text/javascript">
    $(document).ready(function() {
        $(".add-button").fancybox({
            fitToView: false,
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none'
        });
    });
</script>

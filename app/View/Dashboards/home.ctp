<div class="col-md-8">
<script language="javascript">
        function checkAll(val) {
            var radioBtns = document.getElementsByTagName('INPUT');

            for (i = 0; i < radioBtns.length; i++) {
                if ((radioBtns[i].type == "radio") && (radioBtns[i].value == val)) {
                    radioBtns[i].checked = true;
                }
            }
        }
    </script>

    <TABLE WIDTH="100%" BORDER="1" CELLSPACING="0"> 
        <TR><TD>Yes<BR>

                <INPUT TYPE="radio" NAME="rball" VALUE="yesall" onClick="checkAll('1');">

                <BR></TD>
            <TD WIDTH="6%">No<BR>

                <INPUT TYPE="radio" NAME="rball" VALUE="noall" onClick="checkAll('0');">

                <BR></TD></TR> 
        <TR><TD><INPUT TYPE="radio" ID="rbrow1Y" NAME="rb1" VALUE="1" ></TD>
            <TD><INPUT TYPE="radio" ID="rbrow1N" NAME="rb1" VALUE="0"></TD></TR> 
        <TR><TD><INPUT TYPE="radio" ID="rbrow2Y" NAME="rb2" VALUE="1" ></TD>
            <TD><INPUT TYPE="radio" ID="rbrow2N" NAME="rb2" VALUE="0"></TD></TR> 
    </TABLE>
    <!-- WIDGET CÁC KHÓA HỌC CÓ THỂ ĐĂNG KÝ-->
    <?php $courses = $this->requestAction(array('guest' => true, 'controller' => 'courses', 'action' => 'khoamoidangki')) ?>
    <?php echo $this->element('Widgets/guest/registering_courses', array('courses' => $courses)); ?>

    <!-- WIDGET Thời khóa biểu hôm nay-->
    <?php echo $this->element('Widgets/guest/today_schedule'); ?>



</div>
<div class="col-md-4">
    <!--WIDGET TIN TỨC - THÔNG BÁO-->
    <?php echo $this->element('Widgets/guest/news'); ?>
    <!--WIDGET LOGIN-->
    <?php
    if (!AuthComponent::user('id'))
        echo $this->element('Widgets/guest/login');
    else {
        echo $this->element('Common/loggedInMenu');
    }
    ?>



</div><!--//col-md-3-->
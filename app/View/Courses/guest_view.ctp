<div class="col-lg-12 content-right">
    <div class="row">
        <h3 class="page-header" style="font-family: arial">Khóa học: <?php echo $course['Course']['name'] ?> </h3>
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li ><a data-toggle="tab" href="#tab_2-4">Lịch học</a></li>
                    <li class=""><a data-toggle="tab" href="#tab_2-2">Thông tin</a></li>
                    <li class="active"><a data-toggle="tab" href="#tab_1-1">Nội dung</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab_1-1" class="tab-pane active">
                        <div class="noi_dung" >
                            <img alt="" class="pull-left"  style="padding-right: 10px; width: 500px;"src="/thgv/files/course/image/<?php echo $course['Course']['image_path'] . '/' . $course['Course']['image']; ?>">

                            <img alt="" class="pull-left"  style="padding-right: 10px; width: 500px;"src="/files/course/image/<?php echo $course['Course']['image_path'] . '/' . $course['Course']['image']; ?>">

<div class="col-lg-12 content-right">
    <?php
    $this->Html->addCrumb('Thông báo', '/manager/messages');
    $this->Html->addCrumb('Thông tin chuyên đề/' . $message['Message']['title']);
    ?>
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#thong_tin_chung">Nội dung</a></li>
            </ul>
            <div class="tab-content">
                <div id="thong_tin_chung" class="tab-pane active">
                    <div class="timeline-item">
                        <h4 class="timeline-header"><?php echo $message['Message']['content']; ?></h4>
                        <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


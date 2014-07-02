<?php $messages = $this->requestAction(array('controller' => 'messages', 'action' => 'getLastMessage')) ?>
<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class=" glyphicon glyphicon-bullhorn"></i> Thông báo</h3>
    </div>
    <div class="panel-body">

        <ul>       
            <?php foreach ($messages as $message): ?>
            <?php if($message['Message']['published']==1&&$message['Message']['category_id']==3){ ?>
                <li><a href="/messages/xem_thong_bao/<?php echo $message['Message']['id'] ?>" class="add-button fancybox.ajax"><?php echo $message['Message']['title'] ?>
                        <span class="badge"><?php
                            $date = new DateTime($message['Message']['created']);
                            echo $date->format('H:i:s, d-m-Y')
                            ?></span></a></li>
            <?php }?>
            <?php endforeach; ?>
        </ul>

    </div>
</div>

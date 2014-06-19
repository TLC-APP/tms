<div class="span10 well">
    <h2>Thông báo</h2>
    <dl>

        <dt>Tiêu đề</dt>
        <dd>
            <?php echo h($message['Message']['title']); ?>
            &nbsp;
        </dd>
        <dt>Nội dung</dt>
        <dd>
            <?php echo h($message['Message']['content']); ?>
            &nbsp;
        </dd>

        <dt>Người tạo</dt>
        <dd>
            <?php echo $message['User']['name']; ?>
            &nbsp;
        </dd>

    </dl>
</div>

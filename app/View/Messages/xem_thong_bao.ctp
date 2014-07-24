<div class="span10 well">
    <h2>Thông báo</h2>
    <dl>
        <dt>Tiêu đề: <?php echo h($message['Message']['title']); ?> </dt>
        <dt>Nội dung: </dt>
        <dd>
            <?php echo $message['Message']['content']; ?>
        </dd>
        <dt>Người tạo: <?php echo $message['User']['name']; ?></dt>
    </dl>
</div>

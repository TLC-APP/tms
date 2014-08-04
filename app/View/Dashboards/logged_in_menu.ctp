<div class="col-md-8">
    Bạn muốn sử dụng chức năng hệ thống với vai trò là ?
    <?php foreach ($users['Group'] as $group): ?>
        <h2><?php echo $this->Html->link($group['name'], '/' . $group['alias']) ?></h2>
    <?php endforeach; ?>
</div>
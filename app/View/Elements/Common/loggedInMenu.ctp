<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class=" fa fa-renren"></i> Phân hệ quản lý</h3>
    </div>
    <div class="panel-body">
        <ul>
            <?php
            foreach ($users['Group'] as $group): ?>
                <li><a href="/<?php echo $group['alias'] ?>"><?php echo $group['name'] ?></a></li>
            <?php endforeach; ?>

        </ul>

    </div>

</div>



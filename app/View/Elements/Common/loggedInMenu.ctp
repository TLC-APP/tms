<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class=" fa fa-renren"></i> Phân hệ quản lý</h3>
    </div>
    <div class="panel-body">
        <ul>
<<<<<<< HEAD
            <?php
            foreach ($users['Group'] as $group): ?>
                <li><a href="/<?php echo $group['alias'] ?>"><?php echo $group['name'] ?></a></li>
=======
            <?php foreach ($users['Group'] as $group): ?>
                <li>
                    <?php echo $this->Html->link($group['name'],array('controller'=>'dashboards','action'=>'home',$group['alias']=>true));?>                
                </li>
>>>>>>> Toan
            <?php endforeach; ?>

        </ul>

    </div>

</div>



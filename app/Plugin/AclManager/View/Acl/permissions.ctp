<div class="col-md-12">
    
    <h3><?php echo sprintf(__("%s permissions"), $aroAlias); ?></h3>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Trang {:page} của {:pages} trang, hiển thị {:current} của {:count} tất cả, bắt đầu từ {:start}, đến {:end}')
        ));
        ?>	
    </p>
    <?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
    <?php echo $this->Form->create('Perms'); ?>
    <table class="table table-bordered table-hover">
        <tr>
            <th>Thao tác (action)</th>
            <?php foreach ($aros as $aro): ?>
                <?php $aro = array_shift($aro); 
   
                ?>
                <th><?php echo h($aro[$aroDisplayField]); ?></th>
            <?php endforeach; ?>
        </tr>
        <?php
        $uglyIdent = Configure::read('AclManager.uglyIdent');
        $lastIdent = null;
        //debug($acos);
        foreach ($acos as $id => $aco) {
            $action = $aco['Action'];
            $alias = $aco['Aco']['alias'];
            $ident = substr_count($action, '/');
            if ($ident <= $lastIdent && !is_null($lastIdent)) {
                for ($i = 0; $i <= ($lastIdent - $ident); $i++) {
                    ?></tr><?php
                }
            }
            if ($ident != $lastIdent) {
                ?><tr class='aclmanager-ident-<?php echo $ident; ?>'><?php
            }
            ?><td><?php echo ($ident == 1 ? "<strong>" : "" ) . ($uglyIdent ? str_repeat("&nbsp;&nbsp;", $ident) : "") . h($alias) . ($ident == 1 ? "</strong>" : "" ); ?></td>
                <?php
                
                foreach ($aros as $aro):                    
                    $inherit = $this->Form->value("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}-inherit");
                    $allowed = $this->Form->value("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}");
                    $value = $inherit ? 'inherit' : null;
                    $icon = $this->Html->image(($allowed ? 'test-pass-icon.png' : 'test-fail-icon.png'));
                    ?>
                    <td><?php 
                    //echo "Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}";
                    echo $icon . " " . $this->Form->select("Perms." . str_replace("/", ":", $action) . ".{$aroAlias}:{$aro[$aroAlias]['id']}", array(array('inherit' => __('Inherit'), 'allow' => __('Allow'), 'deny' => __('Deny'))), array('empty' => __('No change'), 'value' => $value)); ?></td>
                <?php endforeach; ?>
                <?php
                $lastIdent = $ident;
            }
            for ($i = 0; $i <= $lastIdent; $i++) {
                ?></tr><?php
        }
        ?></table>
        <?php
        echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-info'));
        echo $this->Form->end();
        ?>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Trang {:page} của {:pages} trang, hiển thị {:current} của {:count} tất cả, bắt đầu từ {:start}, đến {:end}')
        ));
        ?>	
    </p>
    <?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
</div>
<div class="col-md-1">
    <h3><?php echo __('Manage for'); ?></h3>
    <?php
    $aroModels = Configure::read("AclManager.aros");
    if ($aroModels > 1):
        ?>
        <ul><?php foreach ($aroModels as $aroModel): ?>
                <li><?php echo $this->Html->link($aroModel, array('aro' => $aroModel)); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    
</div>

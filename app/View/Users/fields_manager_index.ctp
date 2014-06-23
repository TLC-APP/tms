<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">DANH SÁCH TẬP HUẤN VIÊN</h3>
            <div id="commentStatus"></div>
            <?php
            echo $this->Form->create('User', array('default' => false, 'id' => 'UserSearchForm'));
            ?>
            <div class="box-tools">
                <div class="input-group">
                    <input type="text" 
                           placeholder="Nhập tên tập huấn viên cần tìm" 
                           style="width: 300px;" 
                           class="form-control input-sm pull-right" 
                           name="name">
                    <div class="input-group-btn">

                        <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>

                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>


            <?php
            $data = $this->Js->get('#UserSearchForm')->serializeForm(array('isForm' => true, 'inline' => true));
            $this->Js->get('#UserSearchForm')->event(
                    'submit', $this->Js->request(
                            array('action' => 'search_teacher','fields_manager'=>false), array(
                        'update' => '#results',
                        'data' => $data,
                        'async' => true,
                        'dataExpression' => true,
                        'method' => 'POST'
                            )
                    )
            );
            echo $this->Js->writeBuffer();
            ?>
        </div>
        <div class="box-body" id="results">
            <div class="table-responsive">

                <table class="table table-hover">
                    <tr>
                        <th>STT</th>
                        <th><?php echo $this->Paginator->sort('name', 'Tên'); ?></th>
                        <th><?php echo $this->Paginator->sort('username'); ?></th>
                        <th><?php echo $this->Paginator->sort('email'); ?></th>
                        <th><?php echo $this->Paginator->sort('phone_number'); ?></th>
                        <th><?php echo $this->Paginator->sort('avatar'); ?></th>
                        <th><?php echo $this->Paginator->sort('activated', 'Đã kích hoạt'); ?></th>
                        <th><?php echo $this->Paginator->sort('last_login', 'Lần đăng nhập cuối'); ?></th>
                        <th class="actions">#</th>
                    </tr>
                    <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <th><?php echo $stt++ ?></th>
                            <td><?php echo $this->Html->link($user['User']['name'],array('fields_manager'=>true,'action'=>'view',$user['User']['id'])); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['phone_number']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['avatar']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['activated']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['last_login']); ?>&nbsp;</td>
                            <td class="actions">

                                <?php echo $this->Html->link('<button type="button" class="btn btn-info">
                        <span class="glyphicon glyphicon-edit"></span></button>', array('fields_manager'=>true,'action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
                        <span class="glyphicon glyphicon-trash"></span></button>', array('fields_manager'=>false,'action' => 'delete', $user['User']['id']), array('escape' => false), __('Bạn có chắc xóa %s?', $user['User']['name'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <p>
                <?php
                echo $this->Paginator->counter(array(
                    'format' => __('Trang {:page} của {:pages} trang, hiển thị {:current} của {:count} tất cả, bắt đầu từ {:start}, đến {:end}')
                ));
                ?>	
            </p>
            <?php
            echo $this->Paginator->pagination(array(
                'ul' => 'pagination'
            ));
            ?>
        </div>
        <div class="box-footer" style="text-align: right;">
            <?php echo $this->Html->link('Thêm mới', array('action' => 'add'), array('class' => 'btn btn-success')); ?>

        </div>
    </div>
</div>

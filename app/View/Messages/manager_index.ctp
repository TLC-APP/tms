<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Danh mục thông báo</h3>
            <div id="commentStatus"></div>
            <?php
            echo $this->Form->create('Message', array('default' => false, 'id' => 'MessageSearchForm'));
            ?>
            <div class="box-tools">
                <div class="input-group">
                    <input type="text"
                           placeholder="Nhập tiêu đề"
                           style="width: 300px;"
                           class="form-control input-sm pull-right"
                           name="title">
                    <div class="input-group-btn">

                        <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>

                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <?php
            $data = $this->Js->get('#MessageSearchForm')->serializeForm(array('isForm' => true, 'inline' => true));
            $this->Js->get('#MessageSearchForm')->event(
                    'submit', $this->Js->request(
                            array('manager' => false, 'action' => 'search'), array(
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
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body" id="results">
            <div class="table-responsive" id="results">
                <table class="table table-hover" >
                    <tr>
                        <th>STT</th>
                        <th><?php echo $this->Paginator->sort('title', 'Tiêu đề'); ?></th>
                        <th><?php echo $this->Paginator->sort('published', 'Trạng thái'); ?></th>
                        <th><?php echo $this->Paginator->sort('created_user_id', 'Người tạo'); ?></th>
                        <th><?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?></th>
                        <th><?php echo $this->Paginator->sort('category_id', 'Nhóm người dùng'); ?></th>
                        <th><?php echo $this->Paginator->sort('receive_user_id', 'Người nhận'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified', 'Ngày cập nhật'); ?></th>
                        <th class="actions"><?php echo 'Thao tác'; ?></th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($messages as $message):
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $this->Html->link($message['Message']['title'], array('manager' => true, 'action' => 'view', $message['Message']['id'])); ?></td>
                            <td><?php echo $message['Message']['published']; ?></td>
                            <td>
                                <?php echo $this->Html->link($message['User']['name'], array('controller' => 'users', 'action' => 'view', $message['User']['id'])); ?>
                            </td>
                            <td><?php echo h($message['Message']['created']); ?></td>

                            <td><?php
                                 echo h($message['Group']['name']);
                                ?>&nbsp;</td>
                            <td>
                                <?php echo $this->Html->link($message['ReceiveUser']['name'], array('controller' => 'users', 'action' => 'view', $message['ReceiveUser']['id'])); ?>
                            </td>

                            <td><?php echo h($message['Message']['modified']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link('<button type="button" class="btn btn-info">
<span class="glyphicon glyphicon-edit"></span></button>', array('action' => 'edit', $message['Message']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
<span class="glyphicon glyphicon-trash"></span></button>', array('manager'=>false,'action' => 'delete', $message['Message']['id']), array('escape' => false), __('Bạn có chắc xóa thông báo?', $message['Message']['title'])); ?>
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
                ?>	</p>
            <?php
            echo $this->Paginator->pagination(array(
                'ul' => 'pagination'
            ));
            ?>
        </div><!-- /.box-body -->

        <div class="box-footer" style="text-align: right;">
            <?php echo $this->Html->link('Thêm mới', array('action' => 'add'), array('class' => 'btn btn-success')); ?>

        </div>

    </div>
</div>
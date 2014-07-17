<div class="col-lg-12 content-right">
    <?php
    $this->Html->addCrumb('Chuyên đề', '/admin/chapters');
    $this->Html->addCrumb('Thông tin chuyên đề/' . $chapter['Chapter']['name']);
    ?>
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#thong_tin_chung">Thông tin</a></li>
                <li class=""><a data-toggle="tab" href="#tai_lieu">Tài liệu</a></li>
            </ul>
            <div class="tab-content">
                <div id="thong_tin_chung" class="tab-pane active">
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i><?php $created=new DateTime($chapter['Chapter']['created']); 
                        echo ' Ngày tạo: '.$created->format('H:i').', '.$created->format('d/m/Y');
                        ?></span>
                        <h3 class="timeline-header"><?php echo h($chapter['Chapter']['name']); ?></h3>
                        <div class="timeline-body">
                            <div class="img-responsive">

                                <?php
                                if (!empty($chapter['Chapter']['image'])) {
                                    echo $this->Html->image("/files/chapter/image/{$chapter['Chapter']['image_path']}/{$chapter['Chapter']['image']}");
                                }
                                ?>

                            </div>
                            <?php echo ($chapter['Chapter']['decriptions']); ?>
                        </div>
                        <div class="timeline-footer" style="text-align: right">
                            <?php
                            echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $chapter['Chapter']['id']), array('escape' => false,
                                'class' => 'add-button btn btn-primary btn-xs fancybox.ajax', 'role' => 'button', 'div' => false));
                            ?>
                            <?php echo $this->Form->postLink('<span class="fa fa-trash-o"></span>', array('admin' => true, 'controller' => 'chapters', 'action' => 'delete', $chapter['Chapter']['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false), __('Bạn chắc xóa chuyên đề %s?', $chapter['Chapter']['name'])); ?>
                        </div>
                    </div>
                </div>

                <div id="tai_lieu" class="tab-pane">
                    <?php
                    echo $this->Html->link('<span><i class="fa fa-paperclip"></i>'
                            . 'Thêm đính kèm</span>', '/chapters/upload/' . $chapter['Chapter']['id'], array('escape' => false,
                        'class' => 'add-button btn btn-primary fancybox.ajax', 'role' => 'button', 'div' => false));
                    ?>
                    <div class="table-responsive" id="attachments_list">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>
                                        STT
                                    </th>
                                    <th>
                                        Tên file
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $stt = 0;
                                foreach ($chapter['Attachment'] as $tailieu):
                                    ?>
                                    <tr id='attachment_<?php echo $tailieu['id'] ?>'>
                                        <td><?php echo ++$stt ?></td>
                                        <td><?php echo $this->Html->link($tailieu['attachment'], array('fields_manager' => false, 'action' => 'download', $tailieu['id'])); ?></td>
                                        <td>
                                            <?php
                                            //                     echo $this->Form->postLink('<button class="btn btn-mini btn-warning" type="button">xóa</button>', array('fields_manager' => false, 'controller' => 'attachments', 'action' => 'delete', $tailieu['id']), array('escape' => false), __('bạn chắc xóa file %s?', $tailieu['attachment']));
                                            echo $this->Html->link('<button class="btn btn-mini btn-warning" type="button">xóa</button>', '/attachments/delete/' . $tailieu['id'], array('escape' => false, 'class' => 'delete-attachment-button'));
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(function() {
        $('.delete-attachment-button').live('click', function(e) {
            var tr = $(this).parent().parent();
            e.preventDefault(); // prevent native submit            
            var href = $(this).attr('href');

            if (confirm('Bạn chắc không ?') === true) {
                $.ajax({
                    type: "POST",
                    url: href
                }).done(function(data, textStatus, jqXHR) {
                    var response = JSON.parse(data);
                    if (response.status === 1) {
                        tr.fadeOut(400, function() {
                            tr.remove();
                        });
                    } else {
                        alert('Lỗi xóa không thành công');
                    }
                });
            }

            return false;
        });
    });
</script>
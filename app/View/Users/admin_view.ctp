<div class="row">
    <h2><?php echo __('User'); ?></h2>
    <dl>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($user['User']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Username'); ?></dt>
        <dd>
            <?php echo h($user['User']['username']); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Email'); ?></dt>
        <dd>
            <?php echo h($user['User']['email']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Birthday'); ?></dt>
        <dd>
            <?php echo h($user['User']['birthday']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Birthplace'); ?></dt>
        <dd>
            <?php echo h($user['User']['birthplace']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Phone Number'); ?></dt>
        <dd>
            <?php echo h($user['User']['phone_number']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Address'); ?></dt>
        <dd>
            <?php echo h($user['User']['address']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Avatar'); ?></dt>
        <dd>
            <?php echo h($user['User']['avatar']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Activated'); ?></dt>
        <dd>
            <?php echo h($user['User']['activated']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Last Login'); ?></dt>
        <dd>
            <?php echo h($user['User']['last_login']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($user['User']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($user['User']['modified']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
    </dl>
</div>

<div class="related">
    <h3>Khóa đang dạy</h3>
    <?php if (!empty($user['TeachingCourse'])): ?>
        <table class="table table-hover">
            <tr>
                <th><?php echo __('Name'); ?></th>
                <th><?php echo __('Decription'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($user['TeachingCourse'] as $teachingCourse): ?>
                <tr>
                    <td><?php echo $teachingCourse['name']; ?></td>
                    <td><?php echo $teachingCourse['decription']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'courses', 'action' => 'view', $teachingCourse['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'courses', 'action' => 'edit', $teachingCourse['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courses', 'action' => 'delete', $teachingCourse['id']), null, __('Are you sure you want to delete # %s?', $teachingCourse['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>
<div class="related">
    <h3>Khóa đã tham gia</h3>
    <?php if (!empty($user['StudentsCourse'])): ?>
        <table class="table table-hover">
            <tr>
                <th>Tên khóa</th>
                <th><?php echo __('Kết quả'); ?></th>
                <th><?php echo __('Đã nhận CC'); ?></th>
                <th><?php echo __('Ngày cấp CC'); ?></th>
                <th><?php echo __('Số CC'); ?></th>
                <th><?php echo __('Ngày tạo'); ?></th>
                <th><?php echo __('Ngày sửa'); ?></th>
                <th><?php echo __('Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($user['StudentsCourse'] as $studentsCourse): ?>
                <tr>
                    <td><?php echo $studentsCourse['Course']['name']; ?></td>
                    <td><?php echo $studentsCourse['is_passed']; ?></td>
                    <td><?php echo $studentsCourse['is_recieved']; ?></td>
                    <td><?php echo $studentsCourse['certificated_date']; ?></td>
                    <td><?php echo $studentsCourse['certificated_number']; ?></td>
                    <td><?php echo $studentsCourse['created']; ?></td>
                    <td><?php echo $studentsCourse['modified']; ?></td>
                    <td><?php echo $studentsCourse['id']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'students_courses', 'action' => 'view', $studentsCourse['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'students_courses', 'action' => 'edit', $studentsCourse['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'students_courses', 'action' => 'delete', $studentsCourse['id']), null, __('Are you sure you want to delete # %s?', $studentsCourse['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>
<div class="related">
    <h3>Vai trò có thể</h3>
    <?php if (!empty($user['Group'])): ?>
        <table class="table table-hover">
            <tr>
                <th><?php echo __('Name'); ?></th>
                <th><?php echo __('Decription'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Modified'); ?></th>
                <th><?php echo __('Id'); ?></th>
            </tr>
            <?php foreach ($user['Group'] as $group): ?>
                <tr>
                    <td><?php echo $group['name']; ?></td>
                    <td><?php echo $group['decription']; ?></td>
                    <td><?php echo $group['created']; ?></td>
                    <td><?php echo $group['modified']; ?></td>
                    <td><?php echo $group['id']; ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>

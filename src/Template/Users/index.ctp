<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('User') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('User List') ?></h3>
    <table cellpadding="0" cellspacing="0" data-col="users">
        <thead>
            <tr>
                <th scope="col" style="width: 3%"><?= $this->Paginator->sort('id',"No.") ?></th>
                <th scope="col" style="width: 15%"><?= $this->Paginator->sort('username') ?></th>
				<th scope="col" style="width: 25%"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col" style="width: 25%"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col" style="width: 10%"><?= $this->Paginator->sort('dept') ?></th>
                <th scope="col" style="width: 10%"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" style="width: 15%" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $cur = $this->Paginator->counter('{{start}}');
            foreach ($users as $user): ?>
            <tr>
                <td class="viewDetail" data-id="<?=$user->id?>"><?= h($cur++) ?></td>
                <td class="viewDetail" data-id="<?=$user->id?>"><?= h($user->username) ?></td>
                <td class="viewDetail" data-id="<?=$user->id?>"><?= h($user->first_name) ?></td>
                <td class="viewDetail" data-id="<?=$user->id?>"><?= h($user->last_name) ?></td>
                <td class="viewDetail" data-id="<?=$user->id?>"><?= h($user->dept) ?></td>
                <td class="viewDetail" data-id="<?=$user->id?>"><?= $status[$user->status] ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-file-text-o']), ['action' => 'view', $user->id],['escape'=>false]) ?>
                    <?= $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-pencil orange']), ['action' => 'edit', $user->id],['escape'=>false]) ?>
                    <?php if ($user->status == 1): ?>
                    <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fa fa-check green']), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to deactive # {0}?', $user->id),'escape'=>false]) ?>
                    <?php else: ?>
                    <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fa fa-times red']), ['action' => 'active', $user->id], ['confirm' => __('Are you sure you want to active # {0}?', $user->id),'escape'=>false]) ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('First')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->last(__('Last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

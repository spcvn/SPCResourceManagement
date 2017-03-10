<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tbl Master Account'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblMasterAccounts index large-9 medium-8 columns content">
    <h3><?= __('Tbl Master Accounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('login_id') ?></th>
                <th><?= $this->Paginator->sort('del_flg') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblMasterAccounts as $tblMasterAccount): ?>
            <tr>
                <td><?= $this->Number->format($tblMasterAccount->id) ?></td>
                <td><?= h($tblMasterAccount->login_id) ?></td>
                <td><?= $this->Number->format($tblMasterAccount->del_flg) ?></td>
                <td><?= h($tblMasterAccount->created) ?></td>
                <td><?= h($tblMasterAccount->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblMasterAccount->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblMasterAccount->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblMasterAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tblMasterAccount->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->prev('<i class="fa fa-chevron-left"></i>', array('class' => 'disabled','escape' => false)); ?>
            <?php echo $this->Paginator->numbers(array('modulus' => 2 ,"first"=>2,'last' => 2  )); ?>
            <?php echo $this->Paginator->next('<i class="fa fa-chevron-right"></i>', array('class' => 'disabled','escape' => false)); ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

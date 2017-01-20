<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exams index large-9 medium-8 columns content">
    <h3><?= __('Exams') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_questions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_delete') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_user') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exams as $exam): ?>
            <tr>
                <td><?= $this->Number->format($exam->id) ?></td>
                <td><?= h($exam->name) ?></td>
                <td><?= $this->Number->format($exam->num_questions) ?></td>
                <td><?= h($exam->create_date) ?></td>
                <td><?= h($exam->update_date) ?></td>
                <td><?= $this->Number->format($exam->is_delete) ?></td>
                <td><?= $this->Number->format($exam->id_user) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $exam->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exam->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

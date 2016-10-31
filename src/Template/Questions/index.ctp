<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link('Export Questions', ['action' => 'exportQuestion']) ?></li>
        <li><?= $this->Html->link('Export Answer', ['action' => 'exportAnswer']) ?></li>
        <li><?= $this->Html->link('Import', ['action' => 'import']) ?></li>
    </ul>
</nav>
<div class="questions index large-9 medium-8 columns content">
    <h3><?= __('Questions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rank') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td><?= $this->Number->format($question->id) ?></td>
                <td><?= $question->content ?></td>
                <td><?= $sections[$question->section] ?></td>
                <td><?= $ranks[$question->rank] ?></td>
                <td><?= $status[$question->status] ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $question->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id]) ?>
                    <?php if ($question->status == 1): ?>
                    <?= $this->Form->postLink(__('Deactive'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to deactive # {0}?', $question->id)]) ?>
                    <?php else: ?>
                    <?= $this->Form->postLink(__('Active'), ['action' => 'active', $question->id], ['confirm' => __('Are you sure you want to active # {0}?', $question->id)]) ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

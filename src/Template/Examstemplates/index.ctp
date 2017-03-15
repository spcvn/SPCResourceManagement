<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Examstemplate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examstemplates index large-9 medium-8 columns content">
    <h3><?= __('Examstemplates') ?></h3>
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
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examstemplates as $examstemplate): ?>
            <tr>
                <td><?= $this->Number->format($examstemplate->id) ?></td>
                <td><?= h($examstemplate->name) ?></td>
                <td><?= $this->Number->format($examstemplate->num_questions) ?></td>
                <td><?= h($examstemplate->create_date) ?></td>
                <td><?= h($examstemplate->update_date) ?></td>
                <td><?= $this->Number->format($examstemplate->is_delete) ?></td>
                <td><?= $this->Number->format($examstemplate->id_user) ?></td>
                <td><?= $this->Number->format($examstemplate->duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examstemplate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examstemplate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examstemplate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examstemplate->id)]) ?>
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

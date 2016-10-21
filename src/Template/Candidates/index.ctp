
<head>
	 <link rel="stylesheet" href="../RM/webroot/css/style.css" type="text/css"/>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Candidate'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<div class="candidates index large-9 medium-8 columns content">

    <h3><?= __('Candidates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birth_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_salary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interview_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('result') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidate): ?>
            <tr>
                <td><?= $this->Number->format($candidate->id) ?></td>
				<td><div id="linebreak"><?= h($candidate->first_name) ?></div></td>
                <td><div id="linebreak"><?= h($candidate->last_name) ?></td>
                <td><div id="linebreak"><?= h($candidate->birth_date) ?></td>
                <td><div id="linebreak"><?= h($candidate->mobile) ?></td>
                <td><div id="linebreak"><?= h($candidate->position) ?></td>
                <td><div id="linebreak"><?= h($candidate->expected_salary) ?></td>
                <td><div id="linebreak"><?= h($candidate->interview_date) ?></td>
                <td><div id="linebreak"><?= h($candidate->score) ?></td>
                <td><?= h($candidate->result) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $candidate->id]) ?><br>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $candidate->id]) ?><br>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]) ?>
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
</head>
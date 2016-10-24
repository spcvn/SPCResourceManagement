<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Quiz'), ['action' => 'generate']) ?></li>
    </ul>
</nav>
<div class="questions index large-9 medium-8 columns content">
    <h3><?= __('Quizs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('correct') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quizs as $quiz): ?>
            <tr>
                <td><?= $this->Number->format($quiz->id) ?></td>
                <td><?= $this->Number->format($quiz->candidate_id) ?></td>
                <td><?= $quiz->url ?></td>
                <td><?= $this->Number->format($quiz->time) ?></td>
                <td><?= $quiz->quiz_date ?></td>
                <td><?= $this->Number->format($quiz->total) ?></td>
                <td><?= $this->Number->format($quiz->correct) ?></td>
                <td><?= $this->Number->format($quiz->status) ?></td>
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

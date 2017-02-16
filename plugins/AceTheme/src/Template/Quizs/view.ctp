<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Quiz'), ['action' => 'edit', $quiz->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quiz'), ['action' => 'delete', $quiz->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quizs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quiz'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quiz Details'), ['controller' => 'QuizDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quiz Detail'), ['controller' => 'QuizDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
<div class="quizs view large-9 medium-8 columns content">
    <h3><?= h($quiz->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Candidate') ?></th>
            <td><?= $quiz->candidate->id? $this->Html->link($quiz->candidate->first_name.' '.$quiz->candidate->last_name, ['controller' => 'Candidates', 'action' => 'view', $quiz->candidate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($quiz->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= $this->Number->format($quiz->time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($quiz->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($quiz->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($quiz->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quiz Date') ?></th>
            <td><?= h($quiz->quiz_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Code') ?></h4>
        <?= $this->Text->autoParagraph(h($quiz->code)); ?>
    </div>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Html->link($quiz->url,['controller'=>'Quizs','action'=>'test',$quiz->url],['target'=>'_blank']); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Quiz Details') ?></h4>
        <?php if (!empty($quiz->quiz_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Quiz Id') ?></th>
                <th scope="col"><?= __('Question Id') ?></th>
                <th scope="col"><?= __('Answer Id') ?></th>
                <th scope="col"><?= __('Is Correct') ?></th>
                <th scope="col"><?= __('Sort') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($quiz->quiz_details as $quizDetails): ?>
            <tr>
                <td><?= h($quizDetails->quiz_id) ?></td>
                <td><?= h($quizDetails->question_id) ?></td>
                <td><?= h($quizDetails->answer_id) ?></td>
                <td><?= h($quizDetails->is_correct) ?></td>
                <td><?= h($quizDetails->sort) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'QuizDetails', 'action' => 'view', $quizDetails->quiz_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'QuizDetails', 'action' => 'edit', $quizDetails->quiz_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuizDetails', 'action' => 'delete', $quizDetails->quiz_id], ['confirm' => __('Are you sure you want to delete # {0}?', $quizDetails->quiz_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

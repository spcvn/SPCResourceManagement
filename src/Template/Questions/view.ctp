<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questions view large-9 medium-8 columns content">
    <h3><?= h($question->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($question->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question No') ?></th>
            <td><?= $this->Number->format($question->question_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Section') ?></th>
            <td><?= $this->Number->format($question->section) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rank') ?></th>
            <td><?= $this->Number->format($question->rank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($question->status) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($question->content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Answers') ?></h4>
        <?php if (!empty($question->answers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Question Id') ?></th>
                <th scope="col"><?= __('Answer Id') ?></th>
                <th scope="col"><?= __('Answer') ?></th>
                <th scope="col"><?= __('Is Correct') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->answers as $answers): ?>
            <tr>
                <td><?= h($answers->question_id) ?></td>
                <td><?= h($answers->answer_id) ?></td>
                <td><?= h($answers->answer) ?></td>
                <td><?= h($answers->is_correct) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Answers', 'action' => 'view', $answers->answer_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Answers', 'action' => 'edit', $answers->answer_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Answers', 'action' => 'delete', $answers->answer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $answers->answer_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Quiz Details') ?></h4>
        <?php if (!empty($question->quiz_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Quiz Id') ?></th>
                <th scope="col"><?= __('Question Id') ?></th>
                <th scope="col"><?= __('Answer') ?></th>
                <th scope="col"><?= __('Is Correct') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->quiz_details as $quizDetails): ?>
            <tr>
                <td><?= h($quizDetails->quiz_id) ?></td>
                <td><?= h($quizDetails->question_id) ?></td>
                <td><?= h($quizDetails->answer) ?></td>
                <td><?= h($quizDetails->is_correct) ?></td>
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

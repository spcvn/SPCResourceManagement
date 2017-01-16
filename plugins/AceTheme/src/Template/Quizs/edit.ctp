<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quiz->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Quizs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quiz Details'), ['controller' => 'QuizDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quiz Detail'), ['controller' => 'QuizDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="quizs form large-9 medium-8 columns content">
    <?= $this->Form->create($quiz) ?>
    <fieldset>
        <legend><?= __('Edit Quiz') ?></legend>
        <?php
            echo $this->Form->input('candidate_id', ['options' => $candidates]);
            echo $this->Form->input('code');
            echo $this->Form->input('url');
            echo $this->Form->input('time');
            echo $this->Form->input('quiz_date');
            echo $this->Form->input('status');
            echo $this->Form->input('score');
            echo $this->Form->input('total');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

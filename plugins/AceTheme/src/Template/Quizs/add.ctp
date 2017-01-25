<div class="quizs form content">
    <?= $this->Form->create($quiz) ?>
    <fieldset>
        <legend><?= __('Add Quiz') ?></legend>
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

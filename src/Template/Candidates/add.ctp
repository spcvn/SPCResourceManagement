<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="candidates form large-9 medium-8 columns content">
    <?= $this->Form->create($candidate) ?>
    <fieldset>
        <legend><?= __('Add Candidate') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('birth_date', ['minYear' => '1930', 'maxYear' => '2016']);
            echo $this->Form->input('addr01');
            echo $this->Form->input('addr02');
            echo $this->Form->input('mobile');
            echo $this->Form->input('position');
            echo $this->Form->input('expected_salary');
            echo $this->Form->input('interview_date');
            echo $this->Form->input('start_work');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

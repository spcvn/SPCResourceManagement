<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $candidate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="candidates form large-9 medium-8 columns content">
    <?= $this->Form->create($candidate) ?>
    <fieldset>
        <legend><?= __('Edit Candidate') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('birth_date',['minYear' => '1930', 'maxYear' => '2016']);
            $marriedStatus = ['0' => 'Single', '1' => 'Married'];
            echo $this->Form->input('married', ['type' => 'select','options'=>$marriedStatus]);
            echo $this->Form->input('addr01');
            echo $this->Form->input('addr02');
            echo $this->Form->input('mobile');
            echo $this->Form->input('position');
            echo $this->Form->input('expected_salary');
            echo $this->Form->input('interview_date');
            echo $this->Form->input('expected start working day');
            echo $this->Form->input('score');
            $results = ['0' => 'Fail', '2' => 'Pass'];
            echo $this->Form->input('result', ['type' => 'select', 'options' => $results]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

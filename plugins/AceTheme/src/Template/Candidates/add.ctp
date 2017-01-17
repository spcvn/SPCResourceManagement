<div class="candidates form content">
    <?= $this->Form->create($candidate) ?>
    <fieldset>
        <legend><?= __('Add Candidate') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('birth_date');
            echo $this->Form->input('married');
            echo $this->Form->input('addr01');
            echo $this->Form->input('mobile');
            echo $this->Form->input('expected_salary');
            echo $this->Form->input('interview_date');
            echo $this->Form->input('position');
            echo $this->Form->input('score');
            echo $this->Form->input('result');
            echo $this->Form->input('created_date');
            echo $this->Form->input('update_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

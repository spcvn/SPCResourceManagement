<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('salt');
            echo $this->Form->input('email');
            echo $this->Form->input('first_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('addr01');
            echo $this->Form->input('addr02');
            echo $this->Form->input('provinceid');
            echo $this->Form->input('districtid');
            echo $this->Form->input('wardid');
            echo $this->Form->input('birth_date');
            echo $this->Form->input('mobile');
            echo $this->Form->input('dept');
            echo $this->Form->input('avatar');
            echo $this->Form->input('status');
            echo $this->Form->input('role');
            echo $this->Form->input('candidate_id', ['options' => $candidates]);
            echo $this->Form->input('start_work');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

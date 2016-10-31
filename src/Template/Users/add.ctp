<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('username', ['required' => true]);
            echo $this->Form->input('password', ['required' => true]);
            echo $this->Form->input('email', ['required' => true]);
            $status = ['0' => 'Disable', '1' => 'Active'];
            echo $this->Form->input('status', ['type' => 'select', 'options' => $status]);
            echo $this->Form->input('first_name', ['required' => true]);
            echo $this->Form->input('last_name', ['required' => true]);
            echo $this->Form->input('dept', ['required' => true]);
            echo $this->Form->input('mobile');
            echo $this->Form->input('birth_date', ['minYear' => '1930', 'maxYear'=> '2016']);
            echo $this->Form->input('addr01');
            echo $this->Form->input('addr02');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

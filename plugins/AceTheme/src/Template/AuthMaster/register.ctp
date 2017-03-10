<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tbl Master Accounts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblMasterAccounts form large-9 medium-8 columns content">
    <?= $this->Form->create($tblMasterAccount) ?>
    <fieldset>
        <legend><?= __('Add Tbl Master Account') ?></legend>
        <?php
            echo $this->Form->input('login_id');
            echo $this->Form->input('del_flg');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

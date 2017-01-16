<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Middle Name') ?></th>
            <td><?= h($user->middle_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate') ?></th>
            <td><?= $user->has('candidate') ? $this->Html->link($user->candidate->id, ['controller' => 'Candidates', 'action' => 'view', $user->candidate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Provinceid') ?></th>
            <td><?= $this->Number->format($user->provinceid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Districtid') ?></th>
            <td><?= $this->Number->format($user->districtid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wardid') ?></th>
            <td><?= $this->Number->format($user->wardid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $this->Number->format($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birth Date') ?></th>
            <td><?= h($user->birth_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($user->updated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Work') ?></th>
            <td><?= h($user->start_work) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Username') ?></h4>
        <?= $this->Text->autoParagraph(h($user->username)); ?>
    </div>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($user->password)); ?>
    </div>
    <div class="row">
        <h4><?= __('Salt') ?></h4>
        <?= $this->Text->autoParagraph(h($user->salt)); ?>
    </div>
    <div class="row">
        <h4><?= __('Email') ?></h4>
        <?= $this->Text->autoParagraph(h($user->email)); ?>
    </div>
    <div class="row">
        <h4><?= __('First Name') ?></h4>
        <?= $this->Text->autoParagraph(h($user->first_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Last Name') ?></h4>
        <?= $this->Text->autoParagraph(h($user->last_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Addr01') ?></h4>
        <?= $this->Text->autoParagraph(h($user->addr01)); ?>
    </div>
    <div class="row">
        <h4><?= __('Addr02') ?></h4>
        <?= $this->Text->autoParagraph(h($user->addr02)); ?>
    </div>
    <div class="row">
        <h4><?= __('Mobile') ?></h4>
        <?= $this->Text->autoParagraph(h($user->mobile)); ?>
    </div>
    <div class="row">
        <h4><?= __('Dept') ?></h4>
        <?= $this->Text->autoParagraph(h($user->dept)); ?>
    </div>
    <div class="row">
        <h4><?= __('Avatar') ?></h4>
        <?= $this->Text->autoParagraph(h($user->avatar)); ?>
    </div>
    <div class="row">
        <h4><?= __('Status') ?></h4>
        <?= $this->Text->autoParagraph(h($user->status)); ?>
    </div>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Candidate'), ['action' => 'edit', $candidate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Candidate'), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quizs'), ['controller' => 'Quizs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quiz'), ['controller' => 'Quizs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="candidates view large-9 medium-8 columns content">
    <h3><?= h($candidate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($candidate->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Middle Name') ?></th>
            <td><?= h($candidate->middle_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($candidate->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($candidate->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($candidate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Married') ?></th>
            <td><?= $this->Number->format($candidate->married) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($candidate->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birth Date') ?></th>
            <td><?= h($candidate->birth_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interview Date') ?></th>
            <td><?= h($candidate->interview_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($candidate->created_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Date') ?></th>
            <td><?= h($candidate->update_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Addr01') ?></h4>
        <?= $this->Text->autoParagraph(h($candidate->addr01)); ?>
    </div>
    <div class="row">
        <h4><?= __('Expected Salary') ?></h4>
        <?= $this->Text->autoParagraph(h($candidate->expected_salary)); ?>
    </div>
    <div class="row">
        <h4><?= __('Position') ?></h4>
        <?= $this->Text->autoParagraph(h($candidate->position)); ?>
    </div>
    <div class="row">
        <h4><?= __('Result') ?></h4>
        <?= $this->Text->autoParagraph(h($candidate->result)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Quizs') ?></h4>
        <?php if (!empty($candidate->quizs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Candidate Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col"><?= __('Quiz Date') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($candidate->quizs as $quizs): ?>
            <tr>
                <td><?= h($quizs->id) ?></td>
                <td><?= h($quizs->candidate_id) ?></td>
                <td><?= h($quizs->code) ?></td>
                <td><?= h($quizs->url) ?></td>
                <td><?= h($quizs->time) ?></td>
                <td><?= h($quizs->quiz_date) ?></td>
                <td><?= h($quizs->status) ?></td>
                <td><?= h($quizs->score) ?></td>
                <td><?= h($quizs->total) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Quizs', 'action' => 'view', $quizs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Quizs', 'action' => 'edit', $quizs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Quizs', 'action' => 'delete', $quizs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quizs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($candidate->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Salt') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Middle Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Addr01') ?></th>
                <th scope="col"><?= __('Addr02') ?></th>
                <th scope="col"><?= __('Provinceid') ?></th>
                <th scope="col"><?= __('Districtid') ?></th>
                <th scope="col"><?= __('Wardid') ?></th>
                <th scope="col"><?= __('Birth Date') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('Dept') ?></th>
                <th scope="col"><?= __('Avatar') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Candidate Id') ?></th>
                <th scope="col"><?= __('Start Work') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($candidate->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->salt) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->middle_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->addr01) ?></td>
                <td><?= h($users->addr02) ?></td>
                <td><?= h($users->provinceid) ?></td>
                <td><?= h($users->districtid) ?></td>
                <td><?= h($users->wardid) ?></td>
                <td><?= h($users->birth_date) ?></td>
                <td><?= h($users->mobile) ?></td>
                <td><?= h($users->dept) ?></td>
                <td><?= h($users->avatar) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->updated) ?></td>
                <td><?= h($users->status) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->candidate_id) ?></td>
                <td><?= h($users->start_work) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php $results = ['0' => 'Fail', '2' => 'Pass',''=>'---']; ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Candidate') ?></li>
        <li><?= $this->Html->link(__('Edit Candidate'), ['action' => 'edit', $candidate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Candidate'), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Create Test'), ['controller' => 'quizs', 'action' => 'generate', $candidate->id]) ?> </li>
        <li><?=$this->Html->link(__('Member of SPC'),['controller'=>'users','action'=>'changeUser',$candidate->id])?></li>
    </ul>
</nav>
<div class="candidates view large-9 medium-8 columns content">
    <h3>CANDIDATE ID : <?= h($candidate->id) ?></h3>
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
            <th scope="row"><?= __('Married Status') ?></th>
            <td><?= h($candidate->married==0?"Single":"Married") ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Addr01') ?></th>
            <td><?= h($candidate->addr01) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($candidate->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h(isset($select->position[$candidate->position])?$select->position[$candidate->position]:$candidate->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Salary') ?></th>
            <td><?= h($candidate->expected_salary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= h($candidate->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Result') ?></th>
            <td><?= h($results[$candidate->result]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birth Date') ?></th>
            <td><?= h($candidate->birth_date->format('Y-m-d')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interview Date') ?></th>
            <td><?= h($candidate->interview_date->format('Y-m-d H:i')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Work') ?></th>
            <td><?= h($candidate->start_work) ?></td>
        </tr>
    </table>
</div>

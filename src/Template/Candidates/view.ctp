<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Candidate'), ['action' => 'edit', $candidate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Candidate'), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quiz'), ['controller' => 'quizs', 'action' => 'generate', $candidate->id]) ?> </li>
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
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($candidate->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Addr01') ?></th>
            <td><?= h($candidate->addr01) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Addr02') ?></th>
            <td><?= h($candidate->addr02) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($candidate->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($candidate->position) ?></td>
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
            <td><?= h($candidate->result) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($candidate->id) ?></td>
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
            <th scope="row"><?= __('Start Work') ?></th>
            <td><?= h($candidate->start_work) ?></td>
        </tr>
    </table>
</div>

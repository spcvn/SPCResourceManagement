<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Province'), ['action' => 'edit', $province->provinceid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Province'), ['action' => 'delete', $province->provinceid], ['confirm' => __('Are you sure you want to delete # {0}?', $province->provinceid)]) ?> </li>
        <li><?= $this->Html->link(__('List Provinces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Province'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="provinces view large-9 medium-8 columns content">
    <h3><?= h($province->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Provinceid') ?></th>
            <td><?= h($province->provinceid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($province->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($province->type) ?></td>
        </tr>
    </table>
</div>

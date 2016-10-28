<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Quizs'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="questions view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
        </tr>
        <tr>
            <th scope="row"><?= __('Question No') ?></th>
        </tr>
        <tr>
            <th scope="row"><?= __('Section') ?></th>
        </tr>
        <tr>
            <th scope="row"><?= __('Rank') ?></th>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
        </tr>
    </table>
</div>

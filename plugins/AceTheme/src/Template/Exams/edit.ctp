<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exam->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="exams form large-9 medium-8 columns content">
    <?= $this->Form->create($exam) ?>
    <fieldset>
        <legend><?= __('Edit Exam') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('num_questions');
            echo $this->Form->input('section');
            echo $this->Form->input('create_date');
            echo $this->Form->input('update_date');
            echo $this->Form->input('is_delete');
            echo $this->Form->input('id_user');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

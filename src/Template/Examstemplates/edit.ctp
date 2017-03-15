<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examstemplate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examstemplate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Examstemplates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examstemplates form large-9 medium-8 columns content">
    <?= $this->Form->create($examstemplate) ?>
    <fieldset>
        <legend><?= __('Edit Examstemplate') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('num_questions');
            echo $this->Form->input('create_date');
            echo $this->Form->input('update_date');
            echo $this->Form->input('is_delete');
            echo $this->Form->input('id_user');
            echo $this->Form->input('duration');
            echo $this->Form->input('sections._ids', ['options' => $sections]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

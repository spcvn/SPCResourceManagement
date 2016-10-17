<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend><?= __('Add Question') ?></legend>
        <?php
            echo $this->Form->input('section', ['type' => 'select', 'options' => $section]);
            $rank = ['1' => 'Easy', '2' => 'Medium'];
			echo $this->Form->input('rank', ['type' => 'select', 'options' => $rank]);
			echo $this->Form->input('content');
			echo $this->Form->input('answer1');
			echo $this->Form->input('answer2');
			echo $this->Form->input('answer3');
			echo $this->Form->input('answer4');
			echo $this->Form->input('correct_answer');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

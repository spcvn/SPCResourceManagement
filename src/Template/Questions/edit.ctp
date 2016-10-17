<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $question->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend><?= __('Edit Question') ?></legend>
        <?php
            echo $this->Form->input('section', ['type' => 'select', 'options' => $section]);
            $rank = ['1' => 'Easy', '2' => 'Medium'];
			echo $this->Form->input('rank', ['type' => 'select', 'options' => $rank]);
			echo $this->Form->input('content');
			$i = 0;
			foreach($answers as $answer){
				$i ++;
				echo $this->Form->input('answer'.$i, ['default' => $answer]);
			}
			echo $this->Form->input('correct_answer', ['default' => key($correct_answer)]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

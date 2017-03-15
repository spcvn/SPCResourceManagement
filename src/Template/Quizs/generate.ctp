<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Test Assignment') ?></li>
    </ul>
</nav>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Test Assignment') ?></legend>
        <?php
			//echo $this->Form->input('candidate');
			echo $this->Form->input('time', ['required' => 'true', 'pattern' => '^\d+$']);
			echo $this->Form->input('number_questions', ['required' => 'true', 'pattern' => '^\d+$']);
			//echo $this->Form->input('quiz_date', ['type' => 'datetime']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

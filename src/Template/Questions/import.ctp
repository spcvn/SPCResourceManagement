<div class=" form large-9 medium-8 columns content">
    <?= $this->Form->create('Import', ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <?php 
        	echo $this->Form->input('questions', array('type' => 'file'));
			echo $this->Form->input('answers', array('type' => 'file'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<br>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
	<div class="panel">
		<h2 class="text-center">Login</h2>
		<?= $this->Form->create(); ?>
			<?= $this->Form->input('username'); ?>
			<?= $this->Form->input('password', array('type' => 'password')); ?>
			<h2 class="text-center"><?= $this->Form->submit('Login', array('class' => 'button')); ?> </h2>
		<?= $this->Form->end(); ?>
	</div>
</div>
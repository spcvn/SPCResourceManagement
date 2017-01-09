<br/>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
	<div class="panel">
		<h2 class="text-center">Login</h2>
		<?php
			echo $this->Form->create();
			echo $this->Form->input('email', ['required' => true]);
			echo $this->Form->submit('send', array('class' => 'button'));
			echo $this->Form->end();
		?>
	</div>
</div>
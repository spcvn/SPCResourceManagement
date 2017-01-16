<br/>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
	<div class="panel">
		<h2 class="text-center">Reset Pass</h2>
		<?php
			echo $this->Form->create();
			echo $this->Form->input('token',['type'=>'hidden','value'=>$token]);
			echo $this->Form->input('password', ['required' => true]);
			echo $this->Form->input('confirm_password', ['type'=>'password','required' => true]);
			echo $this->Form->submit('send', array('class' => 'button'));
			echo $this->Form->end();
		?>
	</div>
</div>
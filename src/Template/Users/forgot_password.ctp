<?php
	echo $this->Form->create();
	echo $this->Form->input('email', ['required' => true]);
	echo $this->Form->submit('send', array('class' => 'button'));
	echo $this->Form->end();
?>
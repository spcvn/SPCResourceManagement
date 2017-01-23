<?php
	echo $this->Form->create();
	echo $this->Form->input('token',['type'=>'hidden','value'=>$token]);
	echo $this->Form->input('password', ['required' => true]);
	echo $this->Form->input('confirm_password', ['type'=>'password','required' => true]);
	echo $this->Form->submit('send', array('class' => 'button'));
	echo $this->Form->end();
?>
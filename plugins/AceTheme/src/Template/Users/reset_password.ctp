<?php
	echo $this->Form->create();
	echo $this->Form->input('token',['type'=>'hidden','value'=>$token]);
	echo $this->Form->input('password', ['required' => true]);
	echo $this->Form->input('confirm_password', ['type'=>'password','required' => true]);
	echo $this->Form->submit(__('send'), array('class' => 'btn btn-info button'));
	echo $this->Form->end();
?>
<script type="text/javascript">
	$('form').validate({
            rules: {
                password: {
                  required: true,
                  minlength: 6
                },
                confirm_password: {
                  equalTo: "#password"
                },
          }
        });
</script>
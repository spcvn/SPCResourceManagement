<?php
	echo $this->Form->create();
	echo $this->Form->input('email', ['required' => true]);
	echo $this->Form->submit('send', array('class' => 'btn btn-info button'));
	echo $this->Form->end();
?>
<script type="text/javascript">
	$('form').validate({
            rules: {
                email:{
                  required:true,
                  uniqueEmail:true,
                  email:true
                }
          }
        });
</script>
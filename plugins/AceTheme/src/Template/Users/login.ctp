<?php echo $this->Form->create(); ?>
<?= $this->Form->input('username'); ?>
<?= $this->Form->input('password', array('type' => 'password')); ?>
<?= $this->Form->submit('Login', array('class' => 'btn-login')); ?>

<p><?= $this->Html->link(__("Forgot password"),["controller"=>"users","action"=>"forgotPassword"],['class'=>'forgetPassword'])?></p>

<?= $this->Form->end(); ?> 
<!-- File: src/Template/Users/login.ctp -->
<div class="panel">
    <?= $this->Form->create(); ?>
    <?= $this->Form->input('username'); ?>
    <?= $this->Form->input('password', array('type' => 'password')); ?>
    <?= $this->Form->submit(__('login'), array('class' => 'btn-login button')); ?>
    <?= $this->Form->end(); ?>
    <?= $this->Html->link(__("forgot password"),["controller"=>"users","action"=>"forgotPassword"])?>
</div>
<?= $this->Flash->render('auth') ?>
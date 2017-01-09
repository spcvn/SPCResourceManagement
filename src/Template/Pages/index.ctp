<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Catagory') ?></li>
        <li><?= $this->Html->link(__('Question'), ['controller' => 'questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Test Review', ['controller' => 'quizs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Candidate', ['controller' => 'candidates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('User', ['controller' => 'users', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="view large-9 medium-8 columns content">
    <div class="logo">
    	<h1> Welcome to SPCVN</h1>
    	<?=$this->Html->image('logo.png')?>
    </div>
    
</div>
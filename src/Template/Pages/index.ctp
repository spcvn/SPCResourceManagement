<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Question'), ['controller' => 'questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Quiz', ['controller' => 'quizs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Candidates', ['controller' => 'candidates', 'action' => 'index']) ?></li>
    </ul>
</nav>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    </ul>
</nav>
<div class="questions form large-9 medium-8 columns content">
    <p>
    	Please click here to start testing or copy the following URL and open in another browser to assign test.
    </p><br/>
    <a target="_blank" href="/quizs/test/<?= $url ?>"><?= $root_path ?>/quizs/test/<?= $url ?></a>
</div>

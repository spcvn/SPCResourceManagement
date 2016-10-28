<style>
    .wrong{
        color: red;
        font-weight: bold;
    }
    .true{
        color: #00FF00;
        font-weight: bold;
    }
    .correct{
        color: #00FF00;
        font-weight: bold;
    }
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Quizs'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="view large-9 medium-8 columns content">
    <div class="candidate" style="float:left">
        <p><?= $candidates->last_name . $candidates->first_name ?></p>
        <p>Score: <?= $quizs->correct ?></p>
    </div>
    <div class="quiz" style="float:right">
        <p>Quiz Date: <?= (is_null($quizs->quiz_date))? "Not yet":$quizs->quiz_date ?></p>
        <p>Score: <?= $quizs->correct ?></p>
    </div>
</div>
<div class="questions large-9 medium-8 columns content">
    <?php $i=1; ?>
    <?php foreach ($quiz_details as $quiz_detail): ?>
        <legend style="font-size:200%"><?= __('Question'. $i) ?></legend>
        <br>
        <div><b><?= $quiz_detail->question->content ?></b></div>
        <?php foreach ($quiz_detail->question->answers as $answer): ?>
            <div class=<?php if($quiz_detail->answer == $answer->answer_id){
                                if($quiz_detail->is_correct == 0){
                                    echo"wrong";
                                }else if($answer->is_correct == 1){
                                    echo"true";
                                }
                             }else if($answer->is_correct == 1){
                                    echo"correct";
                                }?>>
            <?= "◯ " . $answer->answer ?></div>
        <?php endforeach; ?>
        <?php $i++; ?>
        <br><br>
    <?php endforeach; ?>
</div>

<script>
    $(document).ready(function () {
    	$('.true').append( "<b> &#x02713</b>");
    	$('.wrong').append( "<b> &#x02717</b>");
    });
</script>

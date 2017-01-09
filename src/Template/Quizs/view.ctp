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
    .clear{
        clear: both;
    }
    .questions{
        background-color: #FFFFF0;
    }
    .view{
        background-color: #DCDCDC;
    }
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Test'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="view large-9 medium-8 columns content">
    <div class="candidate left">
        <p><b><?= $candidates->last_name ." ". $candidates->first_name ?></b></p>
        <p>Birth Day: <?= $candidates->birth_date ?></p>
        <p>Position : <?= $candidates->position ?></p>  
        <p>Tell: <?= $candidates->mobile ?></p>  
    </div>
    <div class="quiz right">
        <p>Time: <?= $quizs->time ?> minutes</p>
        <p>Quiz Date: <?= (is_null($quizs->quiz_date))? "Not yet":$quizs->quiz_date ?></p>
        <p>Result: <?= $this->Number->format($quizs->score). "/" . $this->Number->format($quizs->total) ?></p>
    </div>
</div>
<div class="questions large-9 medium-8 columns content clear right">
    <?php $i=1; ?>
    <?php foreach ($quiz_details as $quiz_detail): ?>
        <legend style="font-size:200%"><?= __('Question'. $i) ?></legend>
        <br>
        <div><b><?= h($quiz_detail->question->content) ?></b></div>
        <?php foreach ($quiz_detail->question->answers as $answer): 
        ?>
            <div class=<?php if($quiz_detail->answer_id == $answer->id){
                                if($quiz_detail->is_correct == 0){
                                    echo"wrong";
                                }else if($answer->is_correct == 1){
                                    echo"true";
                                }
                             }else if($answer->is_correct == 1){
                                    echo"correct";
                                }?>>
            <?= "◯ " . htmlspecialchars ($answer->answer) ?></div>
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

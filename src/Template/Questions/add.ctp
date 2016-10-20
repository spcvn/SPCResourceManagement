<style>
	.no_display{
		display: none;
	}
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend><?= __('Add Question') ?></legend>
        <?php
            echo $this->Form->input('section', ['type' => 'select', 'options' => $section]);
            $rank = ['1' => 'Easy', '2' => 'Medium'];
			echo $this->Form->input('rank', ['type' => 'select', 'options' => $rank]);
			echo $this->Form->input('content');
        ?>
        <div id="answer">Answer</div>
        <a href="javascript:addAnswer()" class="button">+</a>
        <a class="delete_answer button" href="javascript:removeAnswer()">-</a>
        <?php
        	echo $this->Form->input('correct_answer');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
	var answer_no = 0;
	
	$( document ).ready(function() {
		checkAnswer(answer_no);
	});
	
	function addAnswer() {
		answer_no++;
		
	    var x = document.createElement("INPUT");
	    x.setAttribute("type", "text");
	    x.setAttribute("name", "answer" + answer_no);
	    x.setAttribute("id", "answer" + answer_no);
	    answer = document.getElementById("answer");
	    answer.appendChild(x);
	    
	    checkAnswer(answer_no);
	}
	
	function removeAnswer(){
		if(answer_no <= 0){
			return;
		}else{
			$('#answer'+answer_no).remove();
			answer_no--;
		}
		checkAnswer(answer_no);
	}
	
	function checkAnswer(answer_no){
		if(answer_no > 0){
			$(".delete_answer").removeClass("no_display");
		}
		else{
			$(".delete_answer").addClass("no_display");
		}
	}
</script>

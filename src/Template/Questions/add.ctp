<style>
	.no_display{
		display: none;
	}
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Add Question') ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend><?= __('Add Question') ?></legend>
        <?php
            echo $this->Form->input('section', ['type' => 'select', 'options' => $section]);
			echo $this->Form->input('content');
        ?>
        <div id="answer">Answer</div>
        <a href="javascript:addAnswer()" class="button">+</a>
        <a class="delete_answer button" href="javascript:removeAnswer()">-</a>
        <?php
        	//echo $this->Form->input('correct_answer', ["required" => "true"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
	var answer_no = 0;
	
	//create 4 answers
    addAnswer();
    addAnswer();
    addAnswer();
    addAnswer();
    
	$( document ).ready(function() {
		CKEDITOR.replace( 'content' );
		checkAnswer(answer_no);
	});
	
	function addAnswer() {
		answer_no++;
		
		var x = document.createElement("INPUT");
	    x.setAttribute("type", "text");
	    x.setAttribute("name", "answer" + answer_no);
	    x.setAttribute("required", "true");
	    
	    var y = document.createElement("LABEL");
	    y.setAttribute("for", "answer" + answer_no);
	    y.innerHTML = "Answer" + answer_no;
	    
	    var t = document.createElement("INPUT");
        t.setAttribute("type", "radio");
        t.setAttribute("name", "correct_answer");
        t.setAttribute("value", answer_no);
	    
	    var z = document.createElement("DIV");
	    z.setAttribute("id", "answer" + answer_no);
	    
	    z.appendChild(y);
	    z.appendChild(t);
	    z.appendChild(x);
	    answer = document.getElementById("answer");
	    //answer.appendChild(y);
	    answer.appendChild(z);
	    
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

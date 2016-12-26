<style>
	.no_display{
		display: none;
	}
</style>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Edit Question') ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question,['id'=>'qForm']) ?>
    <fieldset>
        <legend><?= __('Edit Question') ?></legend>
        <?php
            echo $this->Form->input('section', ['type' => 'select', 'options' => $section]);
			echo $this->Form->input('content');
		?>
		<div id="answer">
			<?php
				$i = 0;
				foreach($answers as $key =>$answer){
					$i++;
					echo $this->Form->input($key, ['default' => $answer, 'required' => 'true']);
				}
			?>
		</div>
        <a href="javascript:addAnswer()" class="button">+</a>
        <a class="delete_answer button" href="javascript:removeAnswer()">-</a>
		<?php
			echo $this->Form->label('Correct Answer');
			echo $this->Form->select('correct_answer', $answers,['default'=>key($correct_answer)]);
        ?>
    </fieldset>
    <?= $this->Html->link(__('Preview'),"javascript:review()",['class'=>'btnPreview']) ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<div id="review" style="display: none">
	<div class="title">Title</div>
	<div class="body">Body</div>
	<div class="footer">
		<?=$this->Html->link('Cancel','#',['class'=>'btn btn-cancel','rel'=>'modal:close'])?>
		<?=$this->Html->link('Save','javascript:submit($("#qForm"))',['class'=>'btn btn-cancel'])?>
	</div>
</div>
<script>
	CKEDITOR.replace( 'content' );
	
	var answer_init = <?php echo count($answers); ?>;
	var answer_no = answer_init;
	
	$( document ).ready(function() {
		checkAnswer(answer_no);
	});
	function review(){
		$('.title').html('Question reviewing');
		$('.body').html('<div class="question"><b>Question : </b>'+CKEDITOR.instances.content.getData()+"</div>");
		var ans = $('#answer').find('input[type=text]');
		$('.body').append();
		ans.each(function(index){
			$('.body').append(
				'<div class="trow"><div class="col-left">Answer '
				+(index+1)
				+': </div><div>'
				+$(this).val()
				+'</div></div>'
			);
		});
		var wWidth = $(window).width();
        var dWidth = wWidth * 0.8;
        console.log(dWidth);
		$('#review').modal({
			escapeClose: false,
			  clickClose: false,
			  showClose: false,
			  width: dWidth
		});
		return false;
	}
	function addAnswer() {
		answer_no++;
	    var x = document.createElement("INPUT");
	    x.setAttribute("type", "text");
	    x.setAttribute("name", "answer" + answer_no);
	    x.setAttribute("required", "true");
	    
	    var y = document.createElement("LABEL");
	    y.setAttribute("for", "answer" + answer_no);
	    y.innerHTML = "Answer" + answer_no;
	    
	    var z = document.createElement("LABEL");
	    z.setAttribute("id", "answer" + answer_no);
	    z.appendChild(y);
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
		if(answer_no > answer_init){
			$(".delete_answer").removeClass("no_display");
		}
		else{
			$(".delete_answer").addClass("no_display");
		}
	}
</script>
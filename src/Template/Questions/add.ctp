<div class="page-header">
    <h1>
        <?= __('question')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('add_question')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<style>
	.no_display{
		display: none;
	}
</style>
<div class="questions form form-question content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <?php
            echo $this->Form->input('section', ['type' => 'select', 'options' => $section]);
            echo $this->Form->label('content');
			echo $this->Form->input('content',['templates' => [
                'formGroup' => '{{input}}'
            ]]);
        ?>
        <div id="answer"><h4><?= __('answer');?> <span>(<?= __('alert_checkbox')?>.)</span></h4></div>
        <div class="actions nopd">
            <a href="javascript:addAnswer()" class="btn btn-success" title="<?= __('title_add_answer')?>"><?= __('add')?> +</a>
            <a class="delete_answer btn btn-danger" href="javascript:removeAnswer()" title="remove an answer"><?= __('remove')?> -</a>
        </div>
    </fieldset>
    <div class="row Actions text-center">
        <div class="col-xs-6">
            <a class="btnPreview" data-toggle="modal" data-target="#reviewQuestion"><?= __('preview'); ?></a>
        </div>
        <div class="col-xs-6">
            <?= $this->Form->button(__('save ').$this->Html->tag('i','',['class'=>'fa fa-save'])) ?>
        </div>

    </div>
    <?= $this->Form->end() ?>
</div>
<div id="reviewQuestion" class="modal fade review-question" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title text-center"><?= __('preview-question')?></h3>
                <h4><?= __('question')?>:</h4>
                <article class="content">
                    <!--//question content here-->
                    <p>Question content here</p>
                </article>
                <h4><?= __('answers') ?>:</h4>
                <ol class="answerList">
                    <li class="correct">Answer 1 <i class="fa fa-check text-success"></i></li>
                    <li>Answer 2</li>
                    <li>Answer 3</li>
                    <li>Answer 4</li>
                </ol>
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-info">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
	var answer_no = 0;
	
	//create 4 answers
    addAnswer();
    addAnswer();
    addAnswer();
    addAnswer();

    jQuery(function($) {
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
	    y.innerHTML = "" + answer_no + ".";
	    
	    var t = document.createElement("INPUT");
        t.setAttribute("type", "radio");
        t.setAttribute("name", "correct_answer");
        t.setAttribute("value", answer_no);
	    
	    var z = document.createElement("DIV");
	    z.setAttribute("id", "answer" + answer_no);
        z.setAttribute("class", "radio-custom");

	    z.appendChild(t);
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
            jQuery('#answer'+answer_no).remove();
			answer_no--;
		}
		checkAnswer(answer_no);
	}
	
	function checkAnswer(answer_no){
		if(answer_no > 0){
            jQuery('.delete_answer').removeClass("no_display");
		}
		else{
            jQuery('.delete_answer').addClass("no_display");
		}
	}
    previewQuestion();
	function previewQuestion(){

    }
</script>

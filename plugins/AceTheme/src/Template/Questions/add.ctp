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
        <div class="question-action">
            <h4><?= __('answer');?> <span>(<?= __('alert_checkbox')?>.)</span></h4>
            <div id="answer">
                <div class="row-answer row">
                    <div class="col-xs-10">
                        <div class="input text">
<!--                            <input type="radio" name="correct_answer" required="true" value="1" checked="checked">-->
                            <label>1.</label>
                            <input type="text" name="answer1" required="true">
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <a class="btnDelete" href="#"><i class="fa fa-trash red"></i></a>
                    </div>

                </div>
                <div class="row-answer row">
                    <div class="col-xs-10">
                        <div class="input text">
                            <!--                            <input type="radio" name="correct_answer" required="true" value="1" checked="checked">-->
                            <label>2.</label>
                            <input type="text" name="answer1" required="true">
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <a class="btnDelete" href="#"><i class="fa fa-trash red"></i></a>
                    </div>

                </div>
                <div class="row-answer row">
                    <div class="col-xs-10">
                        <div class="input text">
                            <!--                            <input type="radio" name="correct_answer" required="true" value="1" checked="checked">-->
                            <label>3.</label>
                            <input type="text" name="answer1" required="true">
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <a class="btnDelete" href="#"><i class="fa fa-trash red"></i></a>
                    </div>

                </div>
                <div class="row-answer row">
                    <div class="col-xs-10">
                        <div class="input text">
                            <!--                            <input type="radio" name="correct_answer" required="true" value="1" checked="checked">-->
                            <label>4.</label>
                            <input type="text" name="answer1" required="true">
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <a class="btnDelete" href="#"><i class="fa fa-trash red"></i></a>
                    </div>

                </div>
            </div>
            <div class="actions">
                <a href="javascript:addAnswer()" class="btn btn-success" title="<?= __('title_add_answer')?>"><?= __('add')?> +</a>
                <a class="delete_answer btn btn-danger" href="javascript:removeAnswer()" title="<?= __('title_remove_answer')?>"><?= __('remove')?> -</a>
            </div>
            <div class="input select">
                <label>Correct answer:</label>
                <select>
                    <option>Anwser 1</option>
                    <option>Anwser 2</option>
                    <option>Anwser 3</option>
                    <option>Anwser 4</option>
                </select>
            </div>
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
                <h3 class="modal-title text-center"><?= __('preview_question')?></h3>
                <h4><?= __('section')?></h4>
                <article class="content">
                    <p>HTML</p>
                </article>
                <h4><?= __('question')?>:</h4>
                <article class="content" id="content_question">
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
	var answer_no = 4;
	
	//create 4 answers
//    addAnswer();
//    addAnswer();
//    addAnswer();
//    addAnswer();

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
	    
//	    var t = document.createElement("INPUT");
//        t.setAttribute("type", "radio");
//        t.setAttribute("name", "correct_answer");
//        t.setAttribute("required", "true");
//        t.setAttribute("value", answer_no);
	    
	    var z = document.createElement("DIV");
	    z.setAttribute("id", "answer" + answer_no);
        z.setAttribute("class", "input text");

//	    z.appendChild(t);
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
    addAnswerCorrect();
    function addAnswerCorrect(){
	    $('.radio-custom:first-child input').attr('checked','checked');
    }
    function deleteAnswer(){
        $('.row-answer').each(function () {
            $(this).find('.btnDelete').confirm({
                content: "Do you want to delete this?",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
//                        action: function(){
//                            location.href = this.$target.attr('href');
//                        }
                    },
                    no: {
                        keys: ['N'],
                    },
                }
            });
        })
    }
    $(document).ready(function () {
        deleteAnswer();
    })
</script>

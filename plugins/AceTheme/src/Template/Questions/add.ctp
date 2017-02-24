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
                'formGroup' => '{{input}}',
                'required' => true
            ]]);
        ?>
        <div class="question-action">
            <h4><?= __('answer');?>:</h4>
            <div id="answer"></div>
            <div class="row">
                <div class="col-sm-2 col-xs-3 text-right">
                    <label>Correct answer:</label>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <div class="input select">
                        <select>
                            <option>Anwser 1</option>
                            <option>Anwser 2</option>
                            <option>Anwser 3</option>
                            <option>Anwser 4</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="Actions text-center">
        <?= $this->Form->button(__('submit')) ?>

    </div>
    <?= $this->Form->end() ?>
</div>
<?= $this->html->script('jquery.validate.min.js'); ?>
<script type="text/javascript">
    jQuery(function($) {
        CKEDITOR.replace( 'content' );
    });
    var num = $('#answer .line-add').length;
    var __mainHtml = function () {
        num++;
        var __htmlAns = '<div class="row line-add">'
            +'<div class="col-xs-3 col-sm-2 text-right">'
            +'<label>Option '+ num +'.</label>'
            +'</div>'
            +'<div class="col-xs-6 col-sm-8">'
            +'<input type="text" name="answer'+num+'" required>'
            +'</div>'
            +'<div class="col-xs-3 col-sm-2">'
            +'<a class="btn btn-remove"><i class="fa fa-remove"></i></a> <a class="btn btn-add">+</i></a>'
            +'</div>'
            +'</div>';
        $('#answer').append(__htmlAns);
    }
    function addAnswer() {
        $('#answer').find('.line-add').removeClass('last');
        $('#answer').on('click','.btn-add',function(e){
            e.preventDefault();
            if(num > 9) return;
            $(this).remove();
            __mainHtml();
            $('#answer').find('.line-add:last-child').addClass('last');
        });
    }
    function removeAnwser(){
        $('#answer').on('click','.btn-remove',function(e){
            e.preventDefault();
            if(num < 1){
                return;
            }
            num--;
            if($(this).parent().parent().is(':last-children')) return;
            $(this).parent().parent().remove();
            $('#answer').find('.line-add:last-child').addClass('last');
        });
    }
    $(document).ready(function () {
        __mainHtml();
        __mainHtml();
        __mainHtml();
        __mainHtml();
        addAnswer();
        removeAnwser();
        $('.questions form').validate();
    })
</script>

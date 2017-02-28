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
            echo $this->Form->input('section_id', ['type' => 'select', 'options' => $section]);
            echo $this->Form->label('content');
			echo $this->Form->input('content',['templates' => [
                'formGroup' => '{{input}}',
            ],['required'=>true]]);
        ?>
        <div class="question-action">
            <h4><?= __('answer');?>:</h4>
            <!-- answer line -->
            <div id="answer">
                <div class="row line-add">
                    <div class="col-xs-3 col-sm-2 text-right">
                        <label>Option 1</label>
                    </div>
                    <div class="col-xs-6 col-sm-8">
                        <input type="text" name="answer1" required  >
                    </div>
                    <div class="col-xs-3 col-sm-2">
                        <a class="btn btn-remove"><i class="fa fa-remove"></i></a> 
                    </div>
                </div>
            
                <div class="row line-add">
                    <div class="col-xs-3 col-sm-2 text-right">
                        <label>Option 2</label>
                    </div>
                    <div class="col-xs-6 col-sm-8">
                        <input type="text" name="answer2" required  >
                    </div>
                    <div class="col-xs-3 col-sm-2">
                        <a class="btn btn-remove"><i class="fa fa-remove"></i></a> 
                    </div>
                </div>
            
                <div class="row line-add">
                    <div class="col-xs-3 col-sm-2 text-right">
                        <label>Option 3</label>
                    </div>
                    <div class="col-xs-6 col-sm-8">
                        <input type="text" name="answer3" required  >
                    </div>
                    <div class="col-xs-3 col-sm-2">
                        <a class="btn btn-remove"><i class="fa fa-remove"></i></a> 
                    </div>
                </div>
            
                <div class="row line-add">
                    <div class="col-xs-3 col-sm-2 text-right">
                        <label>Option 4</label>
                    </div>
                    <div class="col-xs-6 col-sm-8">
                        <input type="text" name="answer4" required  >
                    </div>
                    <div class="col-xs-3 col-sm-2">
                        <a class="btn btn-remove"><i class="fa fa-remove"></i></a> <a class="btn btn-add">+</a>
                    </div>
                </div>
            </div>
            <!--End answer line -->
            <div class="row">
                <div class="col-sm-2 col-xs-3 text-right">
                    <label>Correct answer:</label>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <div class="input select" >
                        <select name="correct_answer" required>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
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
            +'<input type="text" name="answer'+num+'" required onchange="changeVal($(this),' + num + ')" >'
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
            if(num < 2){
                return;
            }
            num--;
            var line = $(this).parents('div.line-add');
            console.log(line.is(':last-child'));
            if(line.is(':last-child')){
                $('.line-add').last().prev().children('div').last().append('<a class="btn btn-add">+</i></a>');
            }
            line.remove();

            for(var i=1; i<=$('#answer').find('label').length; i++){
                $('#answer').find('label')[i-1].innerHTML = "Option "+i;
            }
            var j = 1;
            $('#answer').find('input[type=text]').each(function(index){
                $(this).attr('name','answer'+ j++);
            });
            console.log(num);
            $('select[name=correct_answer] option').remove();
            for (var k = 1; k <= num; k++) {
                $('select[name=correct_answer]').append($('<option>', { value : k }).text("Option "+k));
            }

        });
    }
    function changeVal(element,index){
        var val = "Option "+index;// element.val().replace(/[a-z]. /, '');
        if($('select[name=correct_answer] option[value='+index+']').length == 0){
            $('select[name=correct_answer]').append($('<option>', { value : index }).text(val));
        }else{
            $('select[name=correct_answer] option[value='+index+']').text(val);
        }
        // return element.val(val);
    }
    $(document).ready(function () {
        addAnswer();
        removeAnwser();
        $('.questions form').validate({
            rules: {
                 content: 'Required'
            }
        });
    })
</script>

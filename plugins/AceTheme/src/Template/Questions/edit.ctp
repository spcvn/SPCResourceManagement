<div class="page-header">
    <h1>
        <?= __('question')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('edit_question')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<style>
    .no_display{
        display: none;
    }
    .btnDelete{
        float: right;
        margin: -45px -20px auto;
    }
</style>
<span class="loading" style="display:block"><?=$this->Html->image('../images/loading.gif')?>Loading...</span>
<div class="questions form form-question content no_display">
    <?= $this->Form->create($question,['id'=>'qForm']) ?>
    <fieldset>
        <?php
        echo $this->Form->input('section_id', ['type' => 'select', 'options' => $section]);
        echo $this->Form->label(__('content'));
        echo $this->Form->input('content',['templates' => [
            'formGroup' => '{{input}}'
        ]]);
        ?>
        <div class="question-action">
            <h4><?= __('answer');?>:</h4>
            <div id="answer">
                <?php
                $i = 0;
                foreach($answers as $key =>$answer){
                $i++;
                ?>
                <div class="row line-add">
                    <div class="col-xs-3 col-sm-2 text-right">
                        <label> <?= __('option').$i.': ';?></label>
                    </div>
                    <div class="col-xs-6 col-sm-8">
                        <?php
                        echo $this->Form->input($key, ['label'=>false,'default' => $answer]);?>
                    </div>
                    <div class="col-xs-3 col-sm-2">
                        <a class="btn btn-remove"><i class="fa fa-remove"></i></a>
                        <?php if($i==count($answers)){?>
                        <a class="btn btn-add">+</i></a>
                        <?php }?>
                    </div>
                </div>
                    <?php
                }
                ?>

            </div>
            <div class="row">
                <div class="col-sm-2 col-xs-3 text-right">
                    <?php
                    echo $this->Form->label(__('correct_answer'));
                    ?>
                </div>
                <div class="col-sm-8 col-xs-8">
                    <div class="input select">
                        <?php
                        echo $this->Form->select('correct_answer', $answers,['default'=>key($correct_answer)]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="Actions-end clearfix">
        <?= $this->Form->button(__('save')) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div id="reviewQuestion" class="modal fade review-question" role="dialog">
    <div class="title">Title</div>
    <div class="body">Body</div>
    <div class="footer">
        <?=$this->Html->link(__('cancel'),'#',['class'=>'btn btn-cancel','rel'=>'modal:close'])?>
        <?=$this->Html->link(__('save'),'javascript:submit($("#qForm"))',['class'=>'btn btn-cancel'])?>
    </div>
</div>
<script>
    var answer_init = <?php echo count($answers); ?>;
    var answer_no = answer_init;

    $( document ).ready(function() {
        $(".loading").hide();
         $(".content").show();

        CKEDITOR.replace( 'content' );
        checkAnswer(answer_no);
        addAnswer();
        removeAnwser();
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
        $('#answer').on('click','.btn-add',function(e){
            e.preventDefault();
            if(num > 9) return;
            $(this).remove();
            __mainHtml();
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
            $('#answer .line-add:last-child').addClass('last');
        });
    }

    function checkAnswer(answer_no){
        if(answer_no > answer_init){
            $(".delete_answer").removeClass("no_display");
        }
        else{
            $(".delete_answer").addClass("no_display");
        }
    }
    function changeVal(element,index){
        var val = element.val().replace(/[a-z]. /, '');
        if($('select[name=correct_answer] option[value='+index+']').length == 0){
            // console.log($(this));
            $('select[name=correct_answer]').append($('<option>', { value : index }).text(val));
        }else{
            $('select[name=correct_answer] option[value='+index+']').text(val);
        }
        return element.val(val);
    }
    function deleteAnswer(){
        $('.row-answer').each(function () {
            $(this).find('.btnDelete').confirm({
                content: "Do you want to delete it?",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
                        action: function(){
                            location.href = this.$target.attr('href');
                        }
                    },
                    no: {
                        keys: ['N'],
                    },
                }
            });
        })
    }
</script>
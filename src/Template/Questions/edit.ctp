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
<div class="questions form form-question content">
    <?= $this->Form->create($question,['id'=>'qForm']) ?>
    <fieldset>
        <?php
        echo $this->Form->input('section', ['type' => 'select', 'options' => $section]);
        echo $this->Form->label(__('content'));
        echo $this->Form->input('content',['templates' => [
            'formGroup' => '{{input}}'
        ]]);
        ?>
        <div id="answer">
            <?php
            $i = 0;
            foreach($answers as $key =>$answer){
                $i++;
                ?>
                <div class="row-answer">
                <?php
                echo $this->Form->input(__('answer ').$i, ['default' => $answer, 'required' => 'true']);
                echo $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-times red']), ['action' => 'ansdelete', $key],['escape'=>false,'class'=>'btnDelete']);
                ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="actions">
            <a href="javascript:addAnswer()" class="btn btn-success"><?= __('add')?> +</a>
            <a class="delete_answer btn btn-danger" href="javascript:removeAnswer()"><?= __('remove')?> -</a>
        </div>
        <div class="input select">
            <?php
            echo $this->Form->label(__('correct_answer'));
            echo $this->Form->select('correct_answer', $answers,['default'=>key($correct_answer)]);
            ?>
        </div>
    </fieldset>
    <div class="Actions-end clearfix">
        <?= $this->Html->link(__('preview'),"javascript:review()",['class'=>'btn btn-info btnPreview']) ?>
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
        checkAnswer(answer_no);
        CKEDITOR.replace( 'content' );
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
        $('#reviewQuestion').modal({
            escapeClose: false,
            clickClose: false,
            showClose: false,
            width: dWidth
        });
    }
    function addAnswer() {
        answer_no++;
        var x = document.createElement("INPUT");
        x.setAttribute("type", "text");
        x.setAttribute("name", "answer" + answer_no);
        x.setAttribute("required", "true");
        x.setAttribute("onchange", "changeVal($(this),"+answer_no+")");

        var y = document.createElement("LABEL");
        y.setAttribute("for", "answer" + answer_no);
        y.innerHTML = "Answer " + answer_no;

        var z = document.createElement("div");
        z.setAttribute("id", "answer" + answer_no);
        z.setAttribute("class","input text")
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
            $('select[name=correct_answer] option').each(function(){
                if($( this ).val() == answer_no){
                    $( this ).remove(); 
                }
            });
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
</script>
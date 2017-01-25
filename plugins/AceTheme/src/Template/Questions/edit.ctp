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
        <legend><?= __('Edit Question') ?></legend>
        <?php
        echo $this->Form->input('section', ['type' => 'select', 'options' => $section]);
        echo $this->Form->label('Content');
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
                echo $this->Form->input(__('Answer ').$i, ['default' => $answer, 'required' => 'true']);
                echo $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-times red']), ['action' => 'ansdelete', $key],['escape'=>false,'class'=>'btnDelete']);
                ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="actions">
            <a href="javascript:addAnswer()" class="btn btn-success">Add +</a>
            <a class="delete_answer btn btn-danger" href="javascript:removeAnswer()">Remove -</a>
        </div>
        <div class="input select">
            <?php
            echo $this->Form->label('Correct Answer');
            echo $this->Form->select('correct_answer', $answers,['default'=>key($correct_answer)]);
            ?>
        </div>
    </fieldset>
    <div class="Actions-end clearfix">
        <?= $this->Html->link(__('Preview'),"javascript:review()",['class'=>'btn btn-info btnPreview']) ?>
        <?= $this->Form->button(__('Submit')) ?>
    </div>
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
<style>
	.fix-box{
	    position: fixed;
	    width: 100%;
	    top: 0px;
	    left: 84%;
	}
</style>
<?php 
    $i=1;
    $total = count($arrQuestions);

?>
<div class="container">
    <div class="main-content">
        <div class="test-header">
            <h2>Candidate Name: <span><?= $candidate_info['first_name'] . ' '.$candidate_info['middle_name'].' '. $candidate_info['last_name']; ?></span></h2>
            <p class="position">Applied Position: <strong>IT</strong></p>
            <p>Total question: <strong><?=$total?></strong></p>
            <p>Total time: <strong><?=$totalTime?></strong> (minute)</p>
        </div>
        <div class="area-clock">
            <div class="text">
                <label for="timer">Time</label>
                <span id="timer"></span>
                <label id="statusAnswer">Status : 0/<?=$total?></label>
            </div>
        </div>
        <div class="questions form">
            <?= $this->Form->create('Quiz', ['id' => 'quiz', 'name' => 'quiz']) ?>
            <fieldset>
                <?php foreach ($arrQuestions as $arrQuestion): ?>
                    <div class="question_index" data-ans="uncheck">
                        <legend><?= __('question').' '. $i ?></legend>
                        <article>
                            <p><?= $arrQuestion['content']; ?></p>
                            <?php
                            echo $this->Form->input('question_id'.$i, ['type' => 'hidden', 'value' => $arrQuestion['id']]);
                            ?>
                            <?php $j=1; ?>
                            <?php foreach ($arrQuestion['answer'] as $key => $answer): ?>
                                <input type="radio" name=<?= 'answer'.$i ?> id=<?= 'answer'.$i.$j ?> value=<?= $key ?>>
                                <label for=<?= 'answer'.$i.$j ?>><?= nl2br(htmlspecialchars($answer)); ?> </label>
                                <br />
                                <?php $j++; ?>
                            <?php endforeach; ?>
                            <?php $i++; ?>
                        </article>
                    </div>
                <?php endforeach; ?>
            </fieldset>
            <?= $this->Form->input('status',['type'=>"hidden","value"=>"1"])?>
            <div class="row Actions">
                <!-- <div class="col-xs-6">
                    <?= $this->Html->link(__('stop'),"javascript:cancel()",["id"=>"btnCancel", 'class'=>'btn btn-stop btn-danger'])?>
                </div> -->
                <div class="text-center">
                    <?= $this->Form->button(__('finish'),['class'=>'btn btn-stop btn-danger']) ?>
                </div>

            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>

</div>
<script type="text/javascript">

	// auto submit when timeout
    var count=<?php echo $time; ?>;

    var counter=setInterval(timer, 1000);

    function timer()
    {
        $("#timer").html(secondsTimeSpanToHMS(count));
        console.log($("#timer").width());
        if($("#timer").width() >= 160){
            $('.area-clock #timer').css('font-size','29px');
        }else{
            $('.area-clock #timer').css('font-size','36px');
        }
        if (count <= 0)
        {
        //time out
        $("input[name=status]").val(2);
         clearInterval(counter);
         $('#quiz').submit();
        }
        count = count - 1;
    }
    function secondsTimeSpanToHMS(s) {
        var h = Math.floor(s/3600);
        s -= h*3600;
        var m = Math.floor(s/60);
        s -= m*60;
        return h+":"+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); 
    }
    // fixed timer
    $(document).ready(function () {
	    $(window).bind("scroll", function(e) {
	        var top = $(window).scrollTop();
	      if (top > 150) {
	        $(".sidebars").addClass("fix-box");
	      } else {
	        $(".sidebars").removeClass("fix-box");
	      }
	    });
        $('input[type=radio]').on('click',function(e){
            $(this).parent().parent('div[data-ans=uncheck]').attr('data-ans','checked');
            $("#statusAnswer").html("Status : "+$('.question_index[data-ans=checked]').length+"/"+"<?=$i-1?>");
        });
        setPostionClock();
        btnSubmit();

    });
    /**
    * Edit : Uno Trung
    * date : 2016-28-12
    * @function validate submit test
    * - check not yet answer
    * - scroll to not yet answer
    * - count answered
    */
    function btnSubmit(){
        $('button[type=submit]').confirm({
                content: function(){
                    return contentConfirm();
                }, 
                title : "",
                buttons: {
                    finish: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
                        action:function(){
                            $('#quiz').submit();
                        }
                    },
                    back: {
                        keys: ['N'],
                        action:function(){
                            var question = $('.question_index[data-ans=uncheck]');
                            $('html, body').animate({
                                scrollTop: question.first().offset().top-100
                            }, 2000);
                        }
                    },
                }
            });
    }
    function setPostionClock(){
        var _this = $('.area-clock');
        var wsc = $(window).innerWidth();
        var wct = $('.main-content').innerWidth();
        var point = (wsc-wct)/2 + 5;
        $(_this).css('right',point)
    };
    function contentConfirm(){
        var question = $('.question_index[data-ans=uncheck]');
        if(question.length>0){
            return "<?=__('Some questions is answer, are you sure??? ')?>";
        }else{
            return "<?=__('Are you sure to finish this test?')?>";
        }
    }
    
    
</script>

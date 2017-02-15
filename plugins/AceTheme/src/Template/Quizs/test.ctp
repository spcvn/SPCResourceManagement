<style>
	.fix-box{
	    position: fixed;
	    width: 100%;
	    top: 0px;
	    left: 84%;
	}
</style>
<div class="container">
    <div class="main-content">
        <div class="test-header">
            <h2>Candidate Name: <span><?= $candidate_info['first_name'] . ' '.$candidate_info['middle_name'].' '. $candidate_info['last_name']; ?></span></h2>
            <p class="position">Applied Position: <strong>IT</strong></p>
            <p>Total question: <strong>50</strong></p>
            <p>Total time: <strong>1000</strong> (minute)</p>
        </div>
        <div class="area-clock">
            <div class="text">
                <label for="timer">Time</label>
                <span id="timer"></span>
                <label id="statusAnswer">Status : 0/20</label>
            </div>
        </div>
        <div class="questions form content">
            <?= $this->Form->create('Quiz', ['id' => 'quiz', 'name' => 'quiz', 'onSubmit' => 'return confirmfrmSubmit();']) ?>
            <fieldset>
                <?php $i=1;

                ?>
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
                <div class="col-xs-6">
                    <?= $this->Html->link(__('stop'),"javascript:cancel()",["id"=>"btnCancel", 'class'=>'btn btn-stop btn-danger'])?>
                </div>
                <div class="col-xs-6 text-right">
                    <?= $this->Form->button(__('Submit')) ?>
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
      $("#timer").html(Math.floor(count/60) + ":" + count%60);
      if (count <= 0)
      {
        //time out
        $("input[name=status]").val(2);
         clearInterval(counter);
         $('#quiz').submit();
      }
      count = count - 1;
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
            $(this).parent('div[data-ans=uncheck]').attr('data-ans','checked');
            $("#statusAnswer").html("Status : "+$('.question_index[data-ans=checked]').length+"/"+"<?=$i-1?>");
        });
        setPostionClock();
        setConfirmStop();
    });
    function cancel(){
        if(confirm('You sure you want to CANCEL this test?')){
            //cancel
                $("input[name=status]").val(3);
                clearInterval(counter);
                $('#quiz').submit();
            }
    }
    /**
    * Edit : Uno Trung
    * date : 2016-28-12
    * @function validate submit test
    * - check not yet answer
    * - scroll to not yet answer
    * - count answered
    */
    function confirmfrmSubmit(){
        var question = $('.question_index[data-ans=uncheck]');
        if(question.length>0){
            $('button[type=submit]').confirm({
                content: "<?=__('Are you sure you want to submit')?>",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
                        action:function(){
                            return true;
                        }
                    },
                    no: {
                        keys: ['N'],
                        action:function(){
                            $('html, body').animate({
                                scrollTop: question.first().offset().top-100
                            }, 2000);
                            return false;
                        }
                    },
                }
            });
        }
        return true;
    }
    function setPostionClock(){
        var _this = $('.area-clock');
        var wsc = $(window).innerWidth();
        var wct = $('.main-content').innerWidth();
        var point = (wsc-wct)/2 + 5;
        $(_this).css('right',point)
    };

    function setConfirm(){
        $('button[type=submit]').on('click',function(){
            confirmfrmSubmit();
        });
    }
    function setConfirmStop(){
        $('.btn-stop').confirm({
            content: "<?=__('Are you sure you want to submit')?>",
            title: "",
            buttons: {
                yes: {
                    btnClass:'btn-danger',
                    keys: ['Y'],
                },
                no: {
                    keys: ['N'],
                },
            }
        });
    }
</script>

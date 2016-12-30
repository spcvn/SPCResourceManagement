<style>
	.fix-box{
	    position: fixed;
	    width: 100%;
	    top: 0px;
	    left: 84%;
	}
</style>
<h2><?= $candidate_info['first_name'] . ' ' . $candidate_info['last_name']; ?></h2>
<span class="position">Applied Position: <?= $candidate_info['position'] ?></span>
<div class="sidebars" style="float: right; padding-right: 10%; font-size: 50px">
    <label for="timer">Time : </label>
	<span id="timer"></span>
    <label id="statusAnswer">Status : 0/20</label>
</div>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create('Quiz', ['id' => 'quiz', 'name' => 'quiz', 'onSubmit' => 'return confirmfrmSubmit();']) ?>
    <fieldset>
        <?php $i=1; 
            
        ?>
        <?php foreach ($arrQuestions as $arrQuestion): ?>
            <div class="question_index" data-ans="uncheck">
        	<legend><?= __('Question'. $i) ?></legend>
        	<div><?= nl2br(htmlspecialchars($arrQuestion['content'])); ?></div>
        	<?php 
        		echo $this->Form->input('question_id'.$i, ['type' => 'hidden', 'value' => $arrQuestion['id']]);
        	?>
        	<?php $j=1; ?>
        	<?php foreach ($arrQuestion['answer'] as $key => $answer): ?>
        		<input type="radio" name=<?= 'answer'.$i ?> id=<?= 'answer'.$i.$j ?> value=<?= $key ?>>
        		<label for=<?= 'answer'.$i.$j ?>><?= nl2br(htmlspecialchars($answer)); ?></label>
        		<br />
        		<?php $j++; ?>
        	<?php endforeach; ?>
        	<?php $i++; ?>
        	</div>
        <?php endforeach; ?>
    </fieldset>
    <?= $this->Form->input('status',['type'=>"hidden","value"=>"1"])?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Html->link(__('Cancel'),"javascript:cancel()",["id"=>"btnCancel"]) ?>
    <?= $this->Form->end() ?>
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
            if(confirm('Some questions not yet answer! Do you want stop this test???')){
                return true;
            }
            $('html, body').animate({
                scrollTop: question.first().offset().top-100
            }, 2000);
            return false;
        }
        return true;
    }
</script>
<bottom>
<bottom>
<bottom>

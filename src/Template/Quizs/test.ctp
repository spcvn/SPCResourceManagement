<style>
	.fix-box{
	    position: fixed;
	    width: 100%;
	    top: 0px;
	    left: 83%;
	}
</style>
<h2><?= $candidate_name ?></h2>
<div class="sidebars" style="float: right; padding-right: 10%; font-size: 50px">
	<span id="timer"></span>
</div>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create('Quiz', ['id' => 'quiz', 'name' => 'quiz']) ?>
    <fieldset>
        <?php $i=1; ?>
        <?php foreach ($arrQuestions as $arrQuestion): ?>
        	<legend><?= __('Question'. $i) ?></legend>
        	<div><?= $arrQuestion['content'] ?></div>
        	<?php 
        		echo $this->Form->input('question_id'.$i, ['type' => 'hidden', 'value' => $arrQuestion['id']]);
        	?>
        	<?php $j=1; ?>
        	<?php foreach ($arrQuestion['answer'] as $key => $answer): ?>
        		<input type="radio" name=<?= 'answer'.$i ?> id=<?= 'answer'.$i.$j ?> value=<?= $key ?>>
        		<label for=<?= 'answer'.$i.$j ?>><?= $answer ?></label>
        		<br />
        		<?php $j++; ?>
        	<?php endforeach; ?>
        	<?php $i++; ?>
        	
        <?php endforeach; ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
    
	// auto submit when timeout
    var count=<?php echo $time; ?>;
    
    var counter=setInterval(timer, 1000);

    function timer()
    {
      document.getElementById("timer").innerHTML = Math.floor(count/60) + ":" + count%60;
      if (count <= 0)
      {
         clearInterval(counter);
         document.quiz.submit();
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
});
    
</script>

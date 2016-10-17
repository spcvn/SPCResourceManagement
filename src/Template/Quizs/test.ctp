<body onLoad="">
<h2><?= $candidate_name ?></h2>
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
</body>
<script type="text/javascript">

	/*
	document.onkeydown = function() {    
	    switch (event.keyCode) { 
	        case 116 : //F5 button
	            event.returnValue = false;
	            event.keyCode = 0;
	            return false; 
	        case 82 : //R button
	            if (event.ctrlKey) { 
	                event.returnValue = false; 
	                event.keyCode = 0;  
	                return false; 
           		}
    	}
	}*/
	
	$(window).on('beforeunload', function(){ 
		alert('Are you sure ?');
		});

    window.onload=function(){
    	window.setTimeout(function(){ document.quiz.submit(); }, 100000000);
    }; 
    
</script>

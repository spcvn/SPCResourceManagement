<div class="candidates form content">
    <?= $this->Form->create($candidate) ?>
    <fieldset>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('birth_date',['type'=>'text','class'=>'datepicker']);
            echo $this->Form->input('married');
            echo $this->Form->input('address',['label'=>__('address')]);
            echo $this->Form->input('mobile');
            echo $this->Form->input('expected_salary');
            echo $this->Form->input('interview_date',['type'=>'text','class'=>'datepicker']);
            echo $this->Form->input('position');
            echo $this->Form->input('score');
            echo $this->Form->input('result');
            echo $this->Form->input('created_date',['type'=>'text','class'=>'datepicker']);
            echo $this->Form->input('update_date',['type'=>'text','class'=>'datepicker']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready( function() {
        $( ".datepicker" ).datepicker({
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
        $(".loading").hide();
        $(".content").show('fade');
    } );
</script>
<div class="users form content">
    <div class="wrap-edit">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <?php
            echo $this->Form->input('username', ['type'=>'text']);
            echo $this->Form->input('password');
            echo $this->Form->input('salt', ['type'=>'text']);
            echo $this->Form->input('email', ['type'=>'text']);
            echo $this->Form->input('first_name', ['type'=>'text']);
            echo $this->Form->input('middle_name', ['type'=>'text']);
            echo $this->Form->input('last_name', ['type'=>'text']);
            echo $this->Form->input('addr01', ['type'=>'text']);
            echo $this->Form->input('provinceid',['label'=>'Province']);
            echo $this->Form->input('districtid',['label'=>'District']);
            echo $this->Form->input('wardid',['label'=>'Ward']);
            echo $this->Form->input('birth_date',['type'=>'text', 'label'=>'Birthday Date', 'class'=>'datepicker']);
            echo $this->Form->input('mobile', ['type'=>'text']);
            echo $this->Form->input('dept', ['type'=>'text']);
            echo $this->Form->input('status', ['type'=>'text']);
            //            echo $this->Form->input('candidate_id', ['options' => $candidates]);
            echo $this->Form->input('start_work',['type'=>'text','class'=>'datepicker']);
            ?>
        </fieldset>
        <div class="actions text-center">
            <?= $this->Form->button($this->Html->tag('i','',['class'=>'fa fa-save']).__(' Save')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready( function() {
        $( ".datepicker" ).datepicker();
    } );
</script>
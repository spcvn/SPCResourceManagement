<?php
    $candidates['-1']=__('Select a candidate...');
?>
<div class="users form-register content">
    <?= $this->Form->create($user) ?>
    <div class="row">
        <div class="col-md-5">
            <div class="box-form">
                <h2>Create An Account</h2>
                <?php
                echo $this->Form->input('username',['type'=>'text']);
                echo $this->Form->input('password');
                echo $this->Form->input('confirm-password',['type'=>'password']);
                ?>
            </div>
        </div>
        <div class="col-md-7">
            <div class="box-form">
                <h2>Is Candidate</h2>
                <?=$this->Form->input('candidate_id',['type'=>'select','options'=>$candidates,'default'=>'-1'])?>            
            </div>
            <div class="box-form">
                <h2>Information Account</h2>
                <?php
                echo $this->Form->input('first_name',['type'=>'text']);
                echo $this->Form->input('middle_name',['type'=>'text']);
                echo $this->Form->input('last_name',['type'=>'text']);
                echo $this->Form->input('email',['type'=>'email']);
                echo $this->Form->input('addr01',['label'=>'Address', 'type'=>'text']);
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <?php echo $this->Form->input('provinceid',['label'=>'Province', 'type'=>'select']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('districtid',['label'=>'District', 'type'=>'select']);;?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('wardid',['label'=>'Ward', 'type'=>'select']);?>
                    </div>
                </div>
                <?php
                echo $this->Form->input('birth',['class'=>'datepicker','label'=>'Birthday']);
                echo $this->Form->input('mobile',['type'=>'text']);
                //            echo $this->Form->input('dept');
                echo $this->Form->input('start_work',['type'=>'text','class'=>'datepicker']);
                ?>
            </div>
        </div>
    </div>
    <div class="actions">
        <?= $this->Form->button(__('Submit')) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( ".datepicker" ).datepicker();
    } );
    $('select[name=candidate_id]').on('change',function(event){
        var id = $(this).val();
        var url = "<?=$this->Url->build(['controller'=>'candidates','action'=>'getCandidate'])?>"
        $.post(url,{"id":id},function(resData){
            var data = $.parseJSON(resData);
            $.each(data,function(key,val){
                $('input[name='+key+']').val(val);
            })
            console.log(data);
        });
    });
</script>
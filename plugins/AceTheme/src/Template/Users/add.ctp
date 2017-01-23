<?php
    $candidates['-1']=__('Select a candidate...');
    $user->positions['-1'] = __('Select a position...');
?>
<div class="users form-register content">
    <?= $this->Form->create($user) ?>
    <div class="row">
        <div class="col-md-5">
            <div class="box-form">
                <h2>Create An Account</h2>
                <?php
                echo $this->Form->input('username',['type'=>'text']);
                echo $this->Html->image('../images/loading.gif',['class'=>'user-loading hidden']);
                echo $this->Form->input('password');
                echo $this->Form->input('confirm_password',['type'=>'password']);
                echo "<div class='pass'>&nbsp;</div>";
                echo $this->Html->link(__("Generate password"),"javascript:generationPassword()",["id"=>"btnPassword"]);
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
                echo $this->Form->input('email',['type'=>'email']);
                echo $this->Form->input('first_name',['type'=>'text']);
                echo $this->Form->input('middle_name',['type'=>'text']);
                echo $this->Form->input('last_name',['type'=>'text']);
                echo $this->Form->input('addr01',['label'=>'Address', 'type'=>'text']);
                ?>
                <div class="row">
                    <?php echo $this->cell("Province.Province",['config'=>'all']);?>
                </div>
                <?php
                echo $this->Form->input('birth_date', ['class' => 'datepicker', 'type' => 'text', 'format' => 'Y-m-d', 'default' => date('Y-m-d'), 'value' => !empty($user->birth_date) ? $user->birth_date->format('Y-m-d') : date('Y-m-d')]);
                echo $this->Form->input('mobile',['type'=>'text']);
                echo $this->Form->input('dept',['type'=>'select', 'options'=>$user->positions ,'default'=>'-1']);
                echo $this->Form->input('start_work',['type'=>'text','class'=>'datepicker','default' => date('Y-m-d')]);
                $status = ['0' => 'Active', '1' => 'Disable'];
                echo $this->Form->input('status', ['type' => 'select', 'options' => $status]);
                echo $this->Form->input('role', ['type' => 'hidden', 'value'=>'0']);
                echo $this->Form->input('avatar', ['type' => 'hidden', 'value'=>'default.png']);
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
                if(key=='position')
                    $('select[name=dept]').val(val);
            })
            console.log(data);
        });
    });
    var timer 
    $('input[name=username]').on('keyup',function(){
        $('.user-loading').removeClass('hidden');
        var processing=false;
        var username = $(this).val();
        clearTimeout(timer);
        timer = setTimeout( function(){
            if (!processing){
                processing=true;
                var url = "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>";
                $.post(url,{ username:username },function(res){
                    var data = $.parseJSON(res);
                    $('.user-loading').addClass('hidden');
                    if(data.status == 'exist'){
                        $('input[name=username]').parent('div').addClass('error');
                    }else{
                        $('input[name=username]').parent('div').removeClass('error');
                    }
                    console.log(data);
                });
            }
        }
        ,1000);
    });
</script>
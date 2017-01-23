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
                echo $this->Form->error('error');
                echo $this->Form->input('username',['type'=>'text']);
                echo "<span class='text-error'>";
                echo $this->Html->image('../images/loading.gif',['class'=>'user-loading hidden']);
                echo "</span>";
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
                <div class="row col-3">
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
        <div class="row">
            <div class="col-sm-6 text-left">
                <a class="btn btnPreview" data-toggle="modal" data-target="#reviewUser">Preview</a>
            </div>
            <div class="col-sm-6">
                <?= $this->Form->button(__('Submit')) ?>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
<div id="reviewUser" class="modal fade review-user" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title text-center">INFORMATION USER</h3>
                <ul class="ulnostyle">
                    <li>
                        <h4><strong>Account</strong></h4>
                        <table class="table ViewTable">
                            <tr>
                                <th style="width: 150px;">Username</th>
                                <td style="width: 10px;">:</td>
                                <td>thuyph</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <h4><strong>Information</strong></h4>
                        <table class="table">
                            <tr>
                                <th style="width: 150px;">Email</th>
                                <td style="width: 10px;">:</td>
                                <td>username@email.com</td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>:</td>
                                <td>First Name</td>
                            </tr>
                            <tr>
                                <th>Middle Name</th>
                                <td>:</td>
                                <td>Middle Name</td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td>:</td>
                                <td>Last Name</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>:</td>
                                <td>Nguyen Hien Le, Tan Binh, HCM</td>
                            </tr>
                            <tr>
                                <th>Province</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Ward</th>
                                <td>:</td>
                                <td>Tan Binh</td>
                            </tr>
                            <tr>
                                <th>Birthday</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Dept</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Start work</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td></td>
                            </tr>

                        </table>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-info">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
    $('input[name=username]').on('blur',function(){
        var eleUsername = $( this );
        var classUsername = $( this ).parent('div.input');
        classUsername.find('.error').remove();
        classUsername.append('<img src="/ace_theme/img/../images/loading.gif" class="user-loading"/>');
        var processing=false;
        clearTimeout(timer);
        timer = setTimeout( function(){
            if (!processing){
                processing=true;
                var url = "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>";
                $.post(url,{ username:eleUsername.val() },function(res){
                    var data = $.parseJSON(res);
                    classUsername.find('.user-loading').remove();
                    if(data.status == 'exist'){
                        classUsername.addClass('has-error');
                        classUsername.append('<i class="error">Username is exist, Please pick a another username!</i>');
                    }else{
                        classUsername.find('.error').remove();
                        classUsername.removeClass('has-error');
                    }
                });
            }
        }
        ,1000);
    });
    /*
    * 
    *    $('.has-error') : show error to input element
    *
    */
    $('input[name=email]').on('blur',function(){

        var eleEmail = $( this );
        var classEmail = $('.input.email');
        classEmail.find('.error').remove();
        classEmail.append('<img src="/ace_theme/img/../images/loading.gif" class="user-loading"/>');

        var processing=false;
        clearTimeout(timer);
        timer = setTimeout( function(){
            if (!processing){
                processing=true;
                var url = "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>";
                $.post(url,{ email:eleEmail.val() },function(res){
                    var data = $.parseJSON(res);
                    classEmail.find('.user-loading').remove();
                    if(data.status == 'exist'){
                        classEmail.addClass('has-error');
                        classEmail.append('<i class="error">Username is exist, Please pick a another email!</i>');
                    }else{
                        classEmail.find('.error').remove();
                        classEmail.removeClass('has-error');
                    }
                });
            }
        }
        ,1000);
    });
</script>
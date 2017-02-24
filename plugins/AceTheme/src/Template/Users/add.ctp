<style type="text/css">
  .nodisplay{
    display: none;
  }
  .show{
    display: block;
  }
</style>
<div class="page-header">
    <h1>
        <?= __('users')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('add_user')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<?php
    $candidates['']=__('Select a candidate...');
    asort($candidates);
    $user->positions[''] = __('Select a position...');
?>
  <div class="modal-header">
    <ul class="steps">
      <li data-step="1" class="active">
        <span class="step">1</span>
        <span class="title">Validation states</span>
      </li>

      <li data-step="2">
        <span class="step">2</span>
        <span class="title">Alerts</span>
      </li>

      <li data-step="3">
        <span class="step">3</span>
        <span class="title">Payment Info</span>
      </li>

      <li data-step="4">
        <span class="step">4</span>
        <span class="title">Other Info</span>
      </li>
    </ul>
  </div>
<div class="users form-register content">
    <?= $this->Form->create($user) ?>
    <div class="row">
        <div class="col-md-10 col-md-push-1">
          <section id="step1">
            <div class="box-form">
                <h2><?= __('create_an_account')?>t</h2>
                <?php
                // echo $this->Form->error('error');
                echo $this->Form->input('username',['type'=>'text','required'=>true]);
                echo "<span class='text-error'>";
                echo $this->Html->image('../images/loading.gif',['class'=>'user-loading hidden']);
                echo "</span>";
                echo $this->Form->input('password');
                echo $this->Form->input('confirm_password',['type'=>'password']);
                echo "<div class='pass'>&nbsp;</div>";
                echo $this->Html->link(__('generate_password'),"javascript:generationPassword()",["id"=>"btnPassword"]);
                ?>
            </div>
          </section>
          <section id="step2" class="nodisplay">
            <div class="box-form">
                <h2><?= __('candidate_exists')?></h2>
                <?=$this->Form->input('candidate_id',['type'=>'select','options'=>$candidates,'default'=>''])?>            
            </div>
          </section>
          <section id="step3" class="nodisplay">
            <div class="box-form">
                <h2><?= __('account_information')?></h2>
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
                echo $this->Form->input('birthday', ['name'=>'  birth_date','class' => 'datepicker', 'type' => 'text', 'format' => 'Y-m-d', 'default' => date('Y-m-d'), 'value' => !empty($user->birth_date) ? $user->birth_date->format('Y-m-d') : date('Y-m-d')]);
                echo $this->Form->input('mobile',['type'=>'text']);
                echo $this->Form->input('department',['name'=>'dept','type'=>'select', 'options'=>$user->positions ,'default'=>'']);
                echo $this->Form->input('start_work',['type'=>'text','class'=>'datepicker','default' => date('Y-m-d')]);
                $status = ['0' => 'Active', '1' => 'Disable'];
                echo $this->Form->input('status', ['type' => 'select', 'options' => $status]);
                echo $this->Form->input('role', ['type' => 'hidden', 'value'=>'0']);
                echo $this->Form->input('avatar', ['type' => 'hidden', 'value'=>'default.png']);
                ?>
            </div>
          </section>
          <button id="btn-back" class="nodisplay">Back</button>
          <button id="btn-step">Next</button>
        </div>
        <div class="col-md-7">
            
            
        </div>
    </div>
    <div class="actions">
        <div class="row">
            <div class="col-sm-6 text-left">
                <a class="btn btnPreview" data-toggle="modal" data-target="#reviewUser"><?= __('preview'); ?></a>
            </div>
            <div class="col-sm-6">
                <?= $this->Form->button(__('submit'),['class'=>'btn-submit']) ?>
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
                <h3 class="modal-title text-center"><?= __('user_information')?></h3>
                <ul class="ulnostyle">
                    <li>
                        <h4><strong><?= __('account')?></strong></h4>
                        <table class="table ViewTable">
                            <tr>
                                <th style="width: 150px;"><?= __('username')?></th>
                                <td style="width: 10px;">:</td>
                                <td><span id="get_username"></span></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <h4><strong><?= __('information')?></strong></h4>
                        <table class="table">
                            <tr>
                                <th style="width: 150px;"><?= __('email');?></th>
                                <td style="width: 10px;">:</td>
                                <td><span id="get_email"></td>
                            </tr>
                            <tr>
                                <th><?= __('first_name')?></th>
                                <td>:</td>
                                <td><span id="get_first-name"></td>
                            </tr>
                            <tr>
                                <th><?= __('middle_name')?></th>
                                <td>:</td>
                                <td><span id="get_middle-name"></td>
                            </tr>
                            <tr>
                                <th><?= __('last_name')?></th>
                                <td>:</td>
                                <td><span id="get_last-name"></td>
                            </tr>
                            <tr>
                                <th><?= __('address')?></th>
                                <td>:</td>
                                <td><span id="get_address"></td>
                            </tr>
                            <tr>
                                <th><?= __('province')?></th>
                                <td>:</td>
                                <td><span id="get_provinceid"></td>
                            </tr>
                            <tr>
                                <th><?= __('district')?></th>
                                <td>:</td>
                                <td><span id="get_districtid"></td>
                            </tr>
                            <tr>
                                <th><?= __('ward')?></th>
                                <td>:</td>
                                <td><span id="get_wardid"></td>
                            </tr>
                            <tr>
                                <th><?= __('birthday')?></th>
                                <td>:</td>
                                <td><span id="get_birth-date"></td>
                            </tr>
                            <tr>
                                <th><?= __('mobile')?></th>
                                <td>:</td>
                                <td><span id="get_mobile"></td>
                            </tr>
                            <tr>
                                <th><?= __('department')?></th>
                                <td>:</td>
                                <td><span id="get_dept"></td>
                            </tr>
                            <tr>
                                <th><?= __('start_work')?></th>
                                <td>:</td>
                                <td><span id="get_start-work"></td>
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
<?= $this->Html->script('jquery.validate.min.js')?>
<script>
    $( function() {
        $( ".datepicker" ).datepicker({
            changeYear: true,
            changeMonth: true,
            dateFormat: 'yy-mm-dd',
            yearRange: "-100:+0",
        });

         $('.form-register form').validate({
            rules: {
                mobile: {
                  required: true,
                  number: true
                },
                start_work: {
                  required: true,
                  date: true
                },
                password: {
                  required: true,
                  minlength: 6
                },
                confirm_password: {
                  equalTo: "#password"
                }
          },
          submitHandler:function(form){
            var cur = $('form').find('section:visible');
            cur.hide();
            cur.next('section').first().show('fade');
            btnshow();
          }
        });


        $('#btn-back').on('click',function(e){
          e.preventDefault();
          var cur = $(this).parent().find('section:visible');
          cur.hide();
          cur.prev('section').first().show('fade');
          btnshow();
        });
    } );
    function btnshow(){
      if($('section').first().is(':visible')){
        $('#btn-back').hide();
      }else{
        $('#btn-back').show();
      }
      if($('section').last().is(':visible')){
        $('#btn-step').hide();
      }else{
        $('#btn-step').show();
      }
    }
   $('select[name=candidate_id]').on('change',function(event){
       var id = $(this).val();
       var url = "<?=$this->Url->build(['controller'=>'candidates','action'=>'getCandidate'])?>"
       $.post(url,{"id":id},function(resData){
           var data = $.parseJSON(resData);
           $.each(data,function(key,val){
               $('input[name='+key+']').val(val);
               if(key=='position')
                   $('select[name=dept]').val(val);
           });
       });
   });
   var timer;
   $('input[name=username]').on('blur',function(){
       var eleUsername = $( this );
       if(eleUsername.val() == '' || eleUsername.val() == null) return;
       var classUsername = $( this ).parent('div.input');
       classUsername.append('<img src="/ace_theme/img/../images/loading.gif" class="user-loading"/>');
       var processing=false;
       clearTimeout(timer);
       timer = setTimeout( function(){
           if (!processing){
               processing=true;
               var url = "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>";
               $.post(url,{ username:eleUsername.val() },function(res){
                   $('i.error').remove();
                   var data = $.parseJSON(res);
                   classUsername.find('.user-loading').remove();
                   if(data.status == 'exist'){
                       classUsername.addClass('has-error');
                       classUsername.append('<i class="error">Username is exist, please pick a another username!</i>');
                   }else{
                       classUsername.removeClass('has-error');
                       classUsername.append('<i class="success"></i>');
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
       if(eleEmail.val() == '' || eleEmail.val() == null) return;
       classEmail.append('<img src="/ace_theme/img/../images/loading.gif" class="user-loading"/>');

       var processing=false;
       clearTimeout(timer);
       timer = setTimeout( function(){
           if (!processing){
               processing=true;
               var url = "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>";
               $.post(url,{ email:eleEmail.val() },function(res){
                    $('i.error').remove();
                   var data = $.parseJSON(res);
                   classEmail.find('.user-loading').remove();
                   if(data.status == 'exist'){
                       classEmail.addClass('has-error');
                       eleEmail.addClass('error');
                       classEmail.append('<i class="error">Username is exist, Please pick a another email!</i>');
                   }else{
                       eleEmail.removeClass('error');
                       classEmail.removeClass('has-error');
                   }
               });
           }
       }
       ,1000);
   });
    //load data form to modal preview
    function loadDataModal(){
        $('.form-register input').each(function () {
            $(this).on('change',function () {
                var iname = $(this).attr('id');
                var idname = '#get_'+iname;
                var text = $(this).val();
                $('#reviewUser').find(idname).html(text);
            });
        });
        $('.form-register select').each(function(){
            $(this).on('change',function () {
                var iname = $(this).attr('id');
                var idname = '#get_'+iname;
                var text = $(this).find('option:selected').text();
                $('#reviewUser').find(idname).html(text);
            });

        })

    }
    loadDataModal();

   

</script>
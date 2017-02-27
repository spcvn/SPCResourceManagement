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
<div class="users form-register content">
    <?= $this->Form->create($user) ?>
<div class="modal-content">
      <div id="modal-wizard-container">
        <div class="modal-header">
          <ul class="steps">
            <li data-step="1" class="active">
              <span class="step">1</span>
              <span class="title"><?=__('Select candidate')?></span>
            </li>

            <li data-step="2">
              <span class="step">2</span>
              <span class="title"><?=__('Account infomation')?></span>
            </li>

            <li data-step="3">
              <span class="step">3</span>
              <span class="title"><?=__('Create account')?></span>
            </li>
          </ul>
        </div>

        <div class="modal-body step-content">
          <div class="step-pane active" data-step="1">
                <h2><?= __('candidate_exists')?></h2>
                <?=$this->Form->input('candidate_id',['type'=>'select','options'=>$candidates,'default'=>''])?>            
          </div>

          <div class="step-pane" data-step="2">
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

          <div class="step-pane" data-step="3">
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
        </div>
      </div>

      <div class="modal-footer wizard-actions">
        <button class="btn btn-sm btn-prev">
          <i class="ace-icon fa fa-arrow-left"></i>
          Prev
        </button>

        <button class="btn btn-success btn-sm btn-next" data-last="Finish">
          Next
          <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
        </button>
      </div>
    </div>
    <?= $this->Form->end() ?>
  </div>
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
<div id="dialog" title="" class="modal">
  <?=__("Do you want to save this?")?>
</div>​
<?= $this->Html->script('wizard.min.js')?>
<script>
    $( function() {
      
      $('#modal-wizard-container').ace_wizard()
        .on('actionclicked.fu.wizard' , function(e, info){
          if(!$('.form-register form').valid()){
            e.preventDefault();
          }
          if(info.direction == "prevert"){
            e.preventDefault();
          }
          console.log($('.form-register form').valid());
          console.log("actionclicked");
        })
        .on('finished.fu.wizard', function(e) {
          
          // $('.form-register form').submit();
        }).on('stepclick.fu.wizard', function(e){
          console.log("step head");
          //e.preventDefault();//this will prevent clicking and selecting steps
        });
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
                dept: {
                  required: true
                },
                provinceid: {
                  required: true
                },
                districtid: {
                  required: true
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
                },
                username:{
                  required:true,
                  minlength: 5,
                  uniqueUserName:true
                },
                email:{
                  required:true,
                  uniqueEmail:true,
                  email:true
                }
          },
          submitHandler:function(form){
            
            $("#dialog").dialog({
               modal: true,
               buttons : {
                    "Yes" : function() {
                        $(this).html('<?=__("Please wating...")?>');
                        form.submit();        
                    },
                    "No" : function() {
                      $(this).dialog("close");
                    }
                  }
              });
          }
        });
         var response;
         var timer;
          $.validator.addMethod(
              "uniqueUserName", 
              function(value, element) {
                clearTimeout(timer);
                  timer = setTimeout(function(){
                  $.ajax({
                      type: "POST",
                      url: "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>",
                      data: {'username':value},
                      dataType:"json",
                      success: function(data)
                      {
                          response = ( data.status == 'exist' ) ? false : true ;
                      }
                   });
                  },1000);
                  return response;
              },
              "Username is Already Taken"
          );
          $.validator.addMethod(
              "uniqueEmail", 
              function(value, element) {
                clearTimeout(timer);
                  timer = setTimeout(function(){
                    $.ajax({
                        type: "POST",
                        url: "<?=$this->Url->build(['controller'=>'Users','action'=>'checkExistUserName'])?>",
                        data: {'email':value},
                        dataType:"json",
                        success: function(data)
                        {
                            response = ( data.status == 'exist' ) ? false : true ;
                        }
                     });
                  },1000);
                    return response;
              },
              "Email address is Already Taken"
          );

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
           });
       });
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
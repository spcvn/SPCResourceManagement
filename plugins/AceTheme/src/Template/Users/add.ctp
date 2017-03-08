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

    $jsonDept = json_decode($user->positions);
    $deptOptions = array();
    foreach ($jsonDept as $obj) {
      $deptOptions[$obj->short_name] = $obj->name;
    }
    foreach ($jsonDept as $obj) {
      $posOptions[$obj->short_name][$obj->id] = $obj->position;
    }
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
                <?=$this->Form->input('candidate_id',['type'=>'select','options'=>$candidates,'default'=>'', 'label'=>false])?>
          </div>

          <div class="step-pane" data-step="2">
                  <h2 class="text-center"><?= __('account_information')?></h2>
                  <?php
                  echo $this->Form->input('email',['type'=>'email']);
                  echo $this->Form->input('first_name',['type'=>'text']);
                  echo $this->Form->input('middle_name',['type'=>'text']);
                  echo $this->Form->input('last_name',['type'=>'text']);
                  ?>
                  <div class="row col-3">
                      <?php echo $this->cell("Province.Province",['config'=>'all']);?>
                  </div>
                  <?php
                  echo $this->Form->input('addr01',['label'=>'Address', 'type'=>'text']);
                  ?>
                  <div class="form-group datetimepk">
                      <label><?= __('birthday'); ?></label>
                      <div class='input-group date' id="">
                          <input type='text' class="form-control datepicker" id='birth-date' name="birth_date" />
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                      <div class="clearfix"></div>
                  </div>
                  <?php
                  echo $this->Form->input('mobile',['type'=>'text']);
                  echo $this->Form->input('position',['type'=>'select', 'options'=>$deptOptions ,'default'=>'']);
                  echo $this->Form->input('department',['name'=>'dept','type'=>'select', 'options'=>null ,'default'=>'']);
                  ?>

                  <div class="form-group datetimepk">
                      <label><?= __('start_working_date'); ?></label>
                      <div class='input-group date'>
                          <input type='text' class="form-control datepicker" id='start-work' name="start_work" />
                          <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                      </div>
                      <div class="clearfix"></div>
                  </div>
                  <?php
                  $status = ['0' => 'Active', '1' => 'Disable'];
                  echo $this->Form->input('status', ['type' => 'select', 'options' => $status]);
                  echo $this->Form->input('role', ['type' => 'hidden', 'value'=>'0']);
                  echo $this->Form->input('avatar', ['type' => 'hidden', 'value'=>'default.png']);
                  ?>
          </div>

          <div class="step-pane" data-step="3">
                <h2 class="text-center"><?= __('create_an_account')?>t</h2>
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
      $('.datepicker').keydown(false);
      $('#modal-wizard-container').ace_wizard()
        .on('actionclicked.fu.wizard' , function(e, info){
          if(!$('.form-register form').valid()){
            e.preventDefault();
          }
          if(info.direction == "prevert"){
            e.preventDefault();
          }
        })
        .on('finished.fu.wizard', function(e) {
          
          // $('.form-register form').submit();
        }).on('stepclick.fu.wizard', function(e){
          //e.preventDefault();//this will prevent clicking and selecting steps
        });
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();
        var year = d.getFullYear();
        var output = d.getFullYear() + '-' +
            (month<10 ? '0' : '') + month + '-' +
            (day<10 ? '0' : '') + day;
        $('#birth-date').datetimepicker({
            format: 'YYYY-MM-DD',
            minDate: new Date(year-65, 0, 1),
            maxDate: new Date(year-16, 11, 31)
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });


        $('input[name=start_work]').datetimepicker({
             format: 'YYYY-MM-DD h:mm:ss A',//use this option to display seconds
             icons: {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-arrows ',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
             },
             minDate: new Date(year, month-6, 1),
              maxDate: new Date(year, month+6, 31),
             useCurrent : true,
             defaultDate : "moment"
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
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

        addRequired('#provinceid');
        addRequired('#districtid');

        $('.datepicker').keydown(false);

        $('select[name=candidate_id]').val('<?=$user->_candidateid?>').trigger('change');

        $('#position').on('change',function(){
          choosing($(this).val());
        });

    } );
    
   $('select[name=candidate_id]').on('change',function(event){
       var id = $(this).val();
       var d = new Date();

       var year = d.getFullYear();
       if(id == ""){
          $('input[type=text]').not('.datepicker').val('');
          $('input[type=email]').val('');
          $('.select.required select').val('');
          return;
       }
       var url = "<?=$this->Url->build(['controller'=>'candidates','action'=>'getCandidate'])?>"
       $.post(url,{"id":id},function(resData){
           var data = $.parseJSON(resData);
           $('#provinceid').provinceAutoFill(data)
           $.each(data,function(key,val){
               $('input[name='+key+']').val(val);
                  if(key=='position')
                    $('select[name=dept]').val(val);
           });
       });
   });
    function addRequired(idi) {
        $(idi).addClass('required').parent().addClass('required');
    };
   
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

    // link 2 selectbox department
    var posOptions = $.parseJSON('<?=json_encode($posOptions)?>');

    function choosing(selected){
      $.each(posOptions, function(key, val) {
        if(selected == key){
           $('#department').find('option').remove();
          $.each(val,function(id,name){
            $('#department').append($('<option>', { value : id }).text(name)); 
          });
        }
      });
    }

</script>
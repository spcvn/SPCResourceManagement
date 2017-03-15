<div class="page-header">
    <h1>
        <?= __('users')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('edit_user')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<?php
    $jsonDept = json_decode($user->positions);
    $deptOptions = array();
    foreach ($jsonDept as $obj) {
      $deptOptions[$obj->short_name] = $obj->name;
    }
    foreach ($jsonDept as $obj) {
      $posOptions[$obj->short_name][$obj->id] = $obj->position;
    }
    $short_name_choosed = "";
    foreach ($jsonDept as $obj) {
        if($obj->id == $user->dept){
            $short_name_choosed = $obj->short_name;
        }
    }
?>
<span class="loading" style="display:block"><?=$this->Html->image('/images/loading.gif')?>Loading...</span>
<div class="users form content" style="display:none">
    <div class="wrap-edit">
        <h2>Edit Information</h2>
        <?= $this->Form->create($user) ?>
        <div class="box-form">
                <?php
                echo $this->Form->input('email',['type'=>'email']);
                echo $this->Form->input('first_name',['type'=>'text']);
                echo $this->Form->input('middle_name',['type'=>'text']);
                echo $this->Form->input('last_name',['type'=>'text']);
                ?>
                <div class="row col-3">
                    <?php echo $this->cell("Province.Province",['config'=>'all',"type"=>"edit",'data'=>$user]);?>
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
                echo $this->Form->input('position',['type'=>'select', 'options'=>$deptOptions]);
                echo $this->Form->input('department',['name'=>'dept','type'=>'select', 'options'=>$user->position ,'default'=>'']);
                ?>
                <div class="form-group datetimepk">
                    <label><?= __('start_working_date'); ?></label>
                    <div class='input-group date' id="">
                        <input type='text' class="form-control datepicker" id='start-work' name="start_work" />
                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
                $status = ['0' => 'Enable', '1' => 'Disable'];
                echo $this->Form->input('status', ['type' => 'select', 'options' => $status]);
                echo $this->Form->input('role', ['type' => 'hidden', 'value'=>'0']);
                echo $this->Form->input('avatar', ['type' => 'hidden', 'value'=>'default.png']);
                ?>
            </div>
        <div class="actions text-center">
            <?= $this->Form->button(__('save')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?= $this->Html->script('jquery.validate.min.js')?>
<script>
    $(document).ready( function() {
        $('.datepicker').keydown(false);
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
             useCurrent : true
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

        $('#birth-date').val('<?=$user->birth_date->format("Y-m-d")?>').datetimepicker('update');
        $('#start-work').val('<?=$user->start_work->format("Y-m-d")?>').datetimepicker('update');
        //load department 
        loaddingSelect('<?=$user->dept?>');

         $(".loading").hide();
         $(".content").show('fade');

        /*
        * validate form
        */
         $('.form form').validate({
            rules: {
                mobile: {
                  required: true,
                  number: true
                },
                start_work: {
                  required: true,
                  date: true
                },
                birth_date: {
                  required: true,
                  date: true
                }
          }
        });

         // linking 2 selectbox department
         $('#position').on('change',function(){
          choosing($(this).val());
        });
    } );
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

    function loaddingSelect(short_name){
        $('#position').val('<?=$short_name_choosed?>');
        choosing('<?=$short_name_choosed?>');
        $('#department').val(short_name);
    }
</script>
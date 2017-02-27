<div class="page-header">
    <h1>
        Candidates
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Edit Candidate
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="candidates form content">
    <div class="wrap-edit">
        <h2>Edit Information</h2>
        <?= $this->Form->create($candidate) ?>
        <fieldset>
            <?php
            // print_r($candidate->interview_date);exit();
            echo $this->Form->input('first_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name');
            ?>
            <div class="form-group datetimepk">
                <label><?= __('birthday'); ?></label>
                <div class='input-group date' id="">
                    <input type='text' class="form-control datepicker" id='birth-date' name="birth_date" value="<?=$candidate->birth_date?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
            $marriedStatus = ['0' => 'Single', '1' => 'Married'];
            echo $this->Form->input('married', ['type' => 'select','options'=>$marriedStatus, 'label'=>'Married Status']);
            echo $this->Form->input('addr01',['label'=>'Address', 'type'=>'text']);
            ?>
            <div class="row col-3">
                <?php echo $this->cell("Province.Province",['config'=>'all',"type"=>"edit",'data'=>$candidate]);?>
            </div>
            <?php
            echo $this->Form->input('mobile');
            echo $this->Form->input('position_id',['options'=>$positions]);
            echo $this->Form->input('expected_salary',['type'=>'select','options'=>$select->salary]);
            echo $this->Form->input('interview_date',['type'=>'text','class'=>'datetimepicker'
                ,'value' => date("Y-m-d H:i:s", strtotime($candidate->interview_date))]);
            $results = ['0' => 'Fail', '2' => 'Pass',''=>'---'];
            echo $this->Form->input('result', ['type' => 'select', 'options' => $results, '']);
            ?>

        </fieldset>
        <div class="Actions text-center">
            <?= $this->Form->button(__('save')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready( function() {
        $('#interview-date').datetimepicker({
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
             useCurrent : true,
             defaultDate : "moment"
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
        var year = (new Date).getFullYear();
        $('#birth-date').datetimepicker({
            format: 'YYYY-MM-DD',
            minDate: new Date(year-65, 0, 1),
            maxDate: new Date(year-16, 11, 31)
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
        $('#birth-date').val('<?=$candidate->birth_date->format("Y-m-d")?>').datetimepicker('update');
        $(".loading").hide();
        $(".content").show('fade');
    } );
</script>
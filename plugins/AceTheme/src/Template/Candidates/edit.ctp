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
    <?= $this->Form->create($candidate) ?> 
    <fieldset>
        <?php
        // print_r($candidate->interview_date);exit();
            echo $this->Form->input('first_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('birth_date', ['type'=>'text','class' => 'datepicker','value' => $candidate->birth_date->format('Y-m-d')]);
            $marriedStatus = ['0' => 'Single', '1' => 'Married'];
            echo $this->Form->input('married', ['type' => 'select','options'=>$marriedStatus]);
            echo $this->Form->input('addr01',['type'=>'text']);
            echo $this->Form->input('mobile');
            echo $this->Form->input('position_id',['options'=>$positions]);
            echo $this->Form->input('expected_salary',['type'=>'select','options'=>$select->salary]);
            echo $this->Form->input('interview_date',['type'=>'text','class'=>'datetimepicker'
                ,'value' => date("Y-m-d H:i:s", strtotime($candidate->interview_date))]);
            $results = ['0' => 'Fail', '2' => 'Pass',''=>'---'];
            echo $this->Form->input('result', ['type' => 'select', 'options' => $results, '']);
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
            changeMonth: true,
            dateFormat: 'yy-mm-dd',
            yearRange: "-100:+0",
        });
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
        $(".loading").hide();
        $(".content").show('fade');
    } );
</script>
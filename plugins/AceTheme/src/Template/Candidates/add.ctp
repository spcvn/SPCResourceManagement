<div class="page-header">
    <h1>
        <?= __('candidate')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('add_candidate')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="candidates form content">
    <div class="wrap-edit">
        <?= $this->Form->create($candidate) ?>
        <fieldset>
            <?php

            echo $this->Form->input('first_name',['label'=>__('first_name')]);
            echo $this->Form->input('middle_name',['label'=>__('middle_name')]);
            echo $this->Form->input('last_name',['label'=>__('last_name')]);
            echo $this->Form->input('email',['required'=>true]);
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
            $marriedStatus = ['0' => __('single'), '1' => __('married')];
            echo $this->Form->input('married',['label'=>__('marriage_status'),'type'=>'select','options'=>$marriedStatus]);
            echo "<div class='row col-3'>";
            echo $this->cell("Province.Province",['config'=>'all']);
            echo "</div>";
            echo $this->Form->input('addr01',['label'=>__('address'),'type'=>'text']);
            echo $this->Form->input('mobile',['label'=>__('mobile')]);
            echo $this->Form->input('position_id',['label'=>__('position'),'type'=>'select','options'=>$positions]);
            echo $this->Form->input('expected_salary',['label'=>__('expected_salary'),'type'=>'select','options'=>$select->salary]);
            //            echo $this->Form->input('interview_date',['type'=>'text','class'=>'datetimepicker']);
            ?>
            <div class="form-group datetimepk">
                <label><?= __('interview_date'); ?></label>
                <div class='input-group date' id="datetimepicker">
                    <input type='text' class="form-control" id='interview-date' name="interview_date" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                <div class="clearfix"></div>
            </div>
        </fieldset>
        <div class="row action">
            <div class="col-xs-12 text-center">
                <?= $this->Form->button(__('submit'),['class'=>'btn-submit']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?= $this->Html->script('jquery.validate.min.js'); ?>
<script>
    //load data form to modal preview

    function addRequired(idi) {
        $(idi).addClass('required').parent().addClass('required');
    };
    $(document).ready( function() {
        $('.datepicker').keydown(false);
        $('#datetimepicker').datetimepicker({
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

        $(".loading").hide();
        $(".content").show('fade');
        addRequired('#provinceid');
        addRequired('#districtid');
        $(".candidates form").validate({
            focusInvalid: false,
        });
    } );

</script>
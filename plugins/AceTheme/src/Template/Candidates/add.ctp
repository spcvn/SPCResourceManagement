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
    <?= $this->Form->create($candidate) ?>
    <fieldset>
        <?php

            echo $this->Form->input('first_name',['label'=>'First Name']);
            echo $this->Form->input('middle_name',['label'=>'Middle Name']);
            echo $this->Form->input('last_name',['label'=>'Last Name']);
            echo $this->Form->input('birthday', ['type'=>'text','class' => 'datepicker']);
            $marriedStatus = ['0' => __('single'), '1' => __('married')];
            echo $this->Form->input('married',['label'=>__('marriage_status'),'type'=>'select','options'=>$marriedStatus]);
            echo $this->Form->input('addr01',['label'=>__('address'),'type'=>'text']);
            echo $this->Form->input('mobile',['label'=>__('contact_no')]);
            echo $this->Form->input('position_id',['label'=>__('position'),'type'=>'select','options'=>$positions]);
            echo $this->Form->input('expected_salary',['label'=>__('salary'),'type'=>'select','options'=>$select->salary]);
//            echo $this->Form->input('interview_date',['type'=>'text','class'=>'datetimepicker']);
        ?>
        <div class="form-group datetimepk">
            <label><?= __('interview_date'); ?></label>
            <div class='input-group date' id='interview-date'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
            <div class="clearfix"></div>
        </div>
    </fieldset>
    <div class="action">
        <div class="col-sm-6">
            <a class="btn btnPreview" data-toggle="modal" data-target="#reviewCandidate"><?= __('preview'); ?></a>
        </div>
        <div class="col-sm-6 text-right">
            <?= $this->Form->button(__('submit'),['class'=>'btn-submit']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
<div id="reviewCandidate" class="modal fade review-candidate" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title text-center"><?= __('candidate_information')?></h3>
                <ul class="ulnostyle">
                    <li>
                        <table class="table">
                            <tr>
                                <th style="width: 150px;"><?= __('first_name');?></th>
                                <td style="width: 10px;">:</td>
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
                                <th><?= __('birthday')?></th>
                                <td>:</td>
                                <td><span id="get_birthday"></td>
                            </tr>
                            <tr>
                                <th><?= __('marriage_status')?></th>
                                <td>:</td>
                                <td><span id="get_married"></td>
                            </tr>
                            <tr>
                                <th><?= __('address')?></th>
                                <td>:</td>
                                <td><span id="get_addr01"></td>
                            </tr>
                            <tr>
                                <th><?= __('mobile')?></th>
                                <td>:</td>
                                <td><span id="get_mobile"></td>
                            </tr>
                            <tr>
                                <th><?= __('department')?></th>
                                <td>:</td>
                                <td><span id="get_position-id"></td>
                            </tr>
                            <tr>
                                <th><?= __('salary')?></th>
                                <td>:</td>
                                <td><span id="get_expected-salary"></td>
                            </tr>
                            <tr>
                                <th><?= __('interview_date')?></th>
                                <td>:</td>
                                <td><span id="get_interview-date"></td>
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
    //load data form to modal preview
    function loadDataModal(){
        $('.candidates form input').each(function () {
            $(this).on('change',function () {
                var iname = $(this).attr('id');
                var idname = '#get_'+iname;
                var text = $(this).val();
                $('#reviewCandidate').find(idname).html(text);
            });
        });
        $('.candidates form select').each(function(){
            $(this).on('change',function () {
                var iname = $(this).attr('id');
                var idname = '#get_'+iname;
                var text = $(this).find('option:selected').text();
                $('#reviewCandidate').find(idname).html(text);
            });

        });

    }
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
        loadDataModal();
    } );
</script>
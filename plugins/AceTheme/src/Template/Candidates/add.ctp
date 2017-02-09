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
            echo $this->Form->input('first_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('birth_date',['type'=>'text','class'=>'datepicker']);
            echo $this->Form->input('married');
            echo $this->Form->input('address',['label'=>__('address')]);
            echo $this->Form->input('mobile');
            echo $this->Form->input('expected_salary',['type'=>'text']);
            echo $this->Form->input('interview_date',['type'=>'text','class'=>'datepicker']);
            echo $this->Form->input('department');
            echo $this->Form->input('score');
            echo $this->Form->input('result');
            echo $this->Form->input('created_date',['type'=>'text','class'=>'datepicker']);
            echo $this->Form->input('update_date',['type'=>'text','class'=>'datepicker']);
        ?>
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
                <h3 class="modal-title text-center"><?= __('information_candidate')?></h3>
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
                                <td><span id="get_first-name"></td>
                            </tr>
                            <tr>
                                <th><?= __('last_name')?></th>
                                <td>:</td>
                                <td><span id="get_last-name"></td>
                            </tr>
                            <tr>
                                <th><?= __('birth_date')?></th>
                                <td>:</td>
                                <td><span id="get_last-name"></td>
                            </tr>
                            <tr>
                                <th><?= __('married')?></th>
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
<script>
    $(document).ready( function() {
        $( ".datepicker" ).datepicker({
            changeYear: true,
            changeMonth: true,
            dateFormat: 'yy-mm-dd',
            yearRange: "-100:+0",
        });
        $(".loading").hide();
        $(".content").show('fade');
    } );
</script>
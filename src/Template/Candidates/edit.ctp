<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Candidate') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $candidate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="candidates form large-9 medium-8 columns content">
    <?= $this->Form->create($candidate,['id'=>'frmCandidate']) ?>
    <fieldset>
        <legend><?= __('Edit Candidate') ?></legend>
         <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('birth_date', ['type'=>'text','id' => 'datepicker','value' => $candidate->birth_date->format('Y-m-d')]);
            echo $this->Form->input('married');
            echo $this->Form->input('addr01',['label'=>'Address']);
            echo $this->Form->input('mobile');
            echo $this->Form->input('expected_salary');
            echo $this->Form->input('interview_date',['type'=>'text','class'=>'datepicker']);
            echo $this->Form->input('position_id',['options'=>$positions]);
            echo $this->Form->input('score');
            echo $this->Form->input('result');
        ?>
        <?php
        // print_r($candidate->interview_date);exit();
            echo $this->Form->input('first_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('birth_date', ['type'=>'text','id' => 'datepicker','value' => $candidate->birth_date->format('Y-m-d')]);
            echo $this->Form->input('married', ['type' => 'select','options'=>$marriedStatus]);
            echo $this->Form->input('addr01',['type'=>'text']);
            echo $this->Form->input('mobile');
            echo $this->Form->input('position',['type'=>'select','options'=>$positions]);
            echo $this->Form->input('expected_salary',['type'=>'select','options'=>$select->salary]);
            echo $this->Form->input('interview_date',['type'=>'text','id'=>'datetimepicker'
                ,'value' => date("Y-m-d H:i:s", strtotime($candidate->interview_date))]);
            $results = ['0' => 'Fail', '2' => 'Pass',''=>'---'];
            echo $this->Form->input('result', ['type' => 'select', 'options' => $results, '']);
        ?>
    </fieldset>
    <?= $this->Html->link(__('Preview'),"javascript:review()",['id'=>'btnPreview']) ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<div id="review" style="display: none">
    <div class="title"><?= __('Add Candidate') ?></div>
    <div class="body">
        <table class="vertical-table">
            <tr>
                <th scope="row"><?= __('First Name') ?></th>
                <td id="first_name"></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Middle Name') ?></th>
                <td id="middle_name"></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Last Name') ?></th>
                <td id="last_name"></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Married Status') ?></th>
                <td id="married"></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Addr01') ?></th>
                <td id="addr01"></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Mobile') ?></th>
                <td id="mobile"></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Position') ?></th>
                <td id="position"></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Expected Salary') ?></th>
                <td id="expected_salary"></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Birth Date') ?></th>
                <td id="birth_date"></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Interview Date') ?></th>
                <td id="interview_date"></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Result') ?></th>
                <td id="result"></td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <?=$this->Html->link('Cancel','#',['class'=>'btn btn-cancel','rel'=>'modal:close'])?>
        <?=$this->Html->link('Save','javascript:submit($("#frmCandidate"))',['class'=>'btn btn-cancel'])?>
    </div>
</div>
<script type="text/javascript">
    function review(){
            var formdata = $('#frmCandidate').serializeArray();
            var data = {};
            var arrMarried = {};
            arrMarried[0] = "Single";
            arrMarried[1] = "Married";

            var arrPosition = {};
            arrPosition['it']="IT Position";
            arrPosition['admin']="Admin";

            var arrResult = {};
            arrResult['']="";
            arrResult[0]="Fail";
            arrResult[2]="Pass";

            $(formdata ).each(function(index, obj){
                (obj.name == 'married')?obj.value = arrMarried[obj.value]:obj.value;
                (obj.name == 'position')?obj.value = arrPosition[obj.value]:obj.value;
                (obj.name == 'result')?obj.value = arrResult[obj.value]:obj.value;
                 $('#review #'+obj.name).html(obj.value);
            });
            var wWidth = $(window).width();
            var dWidth = wWidth * 0.8;
            $('#review').modal({
                escapeClose: false,
                  clickClose: false,
                  showClose: false,
                  width: dWidth
            });
            return false;
        }
</script>

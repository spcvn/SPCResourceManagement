<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="candidates form large-9 medium-8 columns content">
    <?= $this->Form->create($candidate,['id'=>'frmCandidate']) ?>
    <fieldset>
        <legend><?= __('Add Candidate') ?></legend>
        <?php
            echo $this->Form->input('first_name',['label'=>'First Name']);
            echo $this->Form->input('middle_name',['label'=>'Middle Name']);
            echo $this->Form->input('last_name',['label'=>'Last Name']);
            echo $this->Form->input("birth_date", ['type'=>'text','id' => 'datepicker']);
            $marriedStatus = ['0' => 'Single', '1' => 'Married'];
            echo $this->Form->input('married',['label'=>'Marriage status','type'=>'select','options'=>$marriedStatus]);
            echo $this->Form->input('addr01',['label'=>'Address','type'=>'text']);
            echo $this->Form->input('mobile',['label'=>'Contact No.']);
            echo $this->Form->input('position',['label'=>'Position','type'=>'select','options'=>$select->position]);
            echo $this->Form->input('expected_salary',['label'=>'Salary','type'=>'select','options'=>$select->salary]);
            echo $this->Form->input('interview_date',['type'=>'text','id'=>'datetimepicker']);
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
/*
            var arrExpected_salary = {};
            arrExpected_salary['1']="250$ ~ 350$";
            arrExpected_salary['2']="350$ ~ 500$";
            arrExpected_salary['3']="550$ ~ 7500$";*/

            $(formdata ).each(function(index, obj){
                (obj.name == 'married')?obj.value = arrMarried[obj.value]:obj.value;
                (obj.name == 'position')?obj.value = arrPosition[obj.value]:obj.value;
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

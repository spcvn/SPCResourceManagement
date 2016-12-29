<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Deactive'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to deactive # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user,['id'=>'frmUsers']) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('username', ['type'=>'text','required' => true]);
            echo $this->Form->input('password', ['required' => true]);
            echo $this->Form->input('confirm_password',['type'=>'password','required' => true]);
            echo $this->Form->input('email', ['required' => true]);
            $status = ['0' => 'Disable', '1' => 'Active'];
            echo $this->Form->input('status', ['type' => 'select', 'options' => $status]);
            echo $this->Form->input('first_name', ['type'=>'text','required' => true]);
            echo $this->Form->input('middle_name', ['type'=>'text']);
            echo $this->Form->input('last_name', ['type'=>'text','required' => true]);
            $arrDept = ['it'=>"IT",'hr'=>"HR",'admin'=>'Admin'];
            echo $this->Form->input('dept', ['type'=>'select','options'=>$arrDept]);
            echo $this->Form->input('mobile',['type'=>'text']);
            echo $this->Form->input('birth_date', ['minYear' => '1930', 'maxYear'=> '2016']);
            echo $this->Form->input('addr01');
        ?>
    </fieldset>
    <?= $this->Html->link(__('Preview'),"javascript:review()",['id'=>'btnPreview']) ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<div id="review" style="display: none;">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td id="username"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td id="email"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td id="status"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td id="first_name"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td id="last_name"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dept') ?></th>
            <td id="dept"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td id="mobile"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Addr01') ?></th>
            <td id="addr01"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birth Date') ?></th>
            <td id="birth_date"></td>
        </tr>
    </table>
    <div class="footer">
        <?=$this->Html->link('Cancel','#',['class'=>'btn btn-cancel','rel'=>'modal:close'])?>
        <?=$this->Html->link('Save','javascript:submit($("#frmUsers"))',['class'=>'btn btn-cancel'])?>
    </div>
</div>

<script type="text/javascript">
    function review(){
            var formdata = $('#frmUsers').serializeArray();
            var data = {};
            var arrStatus = {};
            arrStatus[0] = "Disable";
            arrStatus[1] = "Enable";

            var arrPosition = {};
            arrPosition['it']="IT Position";
            arrPosition['admin']="Admin";
            arrPosition['hr']="HR";
            console.log(formdata);
            $strDob = "";
            $(formdata).each(function(index, obj){
                (obj.name == 'status')?obj.value = arrStatus[obj.value]:obj.value;
                (obj.name == 'dept')?obj.value = arrPosition[obj.value]:obj.value;
                $('#review #'+obj.name).html(obj.value);
                if(obj.name == "birth_date[year]"){
                    $strDob += obj.value+"-"; 
                }
                if(obj.name == "birth_date[month]"){
                    $strDob += obj.value+"-"; 
                }
                if(obj.name == "birth_date[day]"){
                    $strDob += obj.value; 
                }
                $('#review #birth_date').html($strDob);
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
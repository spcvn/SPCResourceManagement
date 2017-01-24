<span class="loading" style="display:block"><?=$this->Html->image('../images/loading.gif')?>Loading...</span>
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
                echo $this->Form->input('addr01',['label'=>'Address', 'type'=>'text']);
                ?>
                <div class="row col-3">
                    <?php echo $this->cell("Province.Province",['config'=>'all',"type"=>"edit",'data'=>$user]);?>
                </div>
                <?php
                echo $this->Form->input('birth_date', ['class' => 'datepicker', 'type' => 'text', 'format' => 'Y-m-d', 'default' => date('Y-m-d'), 'value' => !empty($user->birth_date) ? $user->birth_date->format('Y-m-d') : date('Y-m-d')]);
                echo $this->Form->input('mobile',['type'=>'text']);
                echo $this->Form->input('position',['type'=>'select','name'=>'dept','default'=>$user->dept,'options'=>$user->positions]);
                echo $this->Form->input('start_work',['type'=>'text','class'=>'datepicker','format' => 'Y-m-d','value'=>!empty($user->start_work)?$user->start_work->format('Y-m-d'):""]);
                $status = ['0' => 'Active', '1' => 'Disable'];
                echo $this->Form->input('status', ['type' => 'select', 'options' => $status]);
                echo $this->Form->input('role', ['type' => 'hidden', 'value'=>'0']);
                echo $this->Form->input('avatar', ['type' => 'hidden', 'value'=>'default.png']);
                ?>
            </div>
        <div class="actions text-center">
            <?= $this->Form->button($this->Html->tag('i','',['class'=>'fa fa-save']).__(' Save')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready( function() {
        $( ".datepicker" ).datepicker({
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
         $(".loading").hide();
         $(".content").show('fade');
    } );
</script>
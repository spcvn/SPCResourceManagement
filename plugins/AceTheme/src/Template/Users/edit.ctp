<div class="users form content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->input('username', ['type'=>'text']);
            echo $this->Form->input('password');
            echo $this->Form->input('salt', ['type'=>'text']);
            echo $this->Form->input('email', ['type'=>'text']);
            echo $this->Form->input('first_name', ['type'=>'text']);
            echo $this->Form->input('middle_name', ['type'=>'text']);
            echo $this->Form->input('last_name', ['type'=>'text']);
            echo $this->Form->input('addr01', ['type'=>'text']);
            echo $this->Form->input('provinceid',['label'=>'Province']);
            echo $this->Form->input('districtid',['label'=>'District']);
            echo $this->Form->input('wardid',['label'=>'Ward']);
            echo $this->Form->input('birth_date');
            echo $this->Form->input('mobile', ['type'=>'text']);
            echo $this->Form->input('dept', ['type'=>'text']);
            echo $this->Form->input('status', ['type'=>'text']);
//            echo $this->Form->input('candidate_id', ['options' => $candidates]);
            echo $this->Form->input('start_work',['class'=>'datapicker']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

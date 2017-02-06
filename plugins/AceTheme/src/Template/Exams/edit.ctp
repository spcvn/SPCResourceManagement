<div class="page-header">
    <h1>
        <?= __('exam')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('edit_exam')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="exams form content">
    <?= $this->Form->create($exam) ?>
    <fieldset>
        <legend><?= __('Edit Exam') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('num_questions');
            echo $this->Form->input('section');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

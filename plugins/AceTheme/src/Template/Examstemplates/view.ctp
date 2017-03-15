<div class="page-header">
    <h1>
        <?= __('quiz')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('view')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="quizs view content">
    <h3><?= h($examstemplate->name) ?></h3>
    <br/>
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($examstemplate->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Questions') ?></th>
            <td><?= $this->Number->format($examstemplate->num_questions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($examstemplate->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Date') ?></th>
            <td><?= $examstemplate->create_date?$examstemplate->create_date->format('Y-m-d h:i:s'):'---' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Date') ?></th>
            <td><?= $examstemplate->update_date?$examstemplate->update_date->format('Y-m-d h:i:s'):'---' ?></td>
        </tr>
    </table>
</div>


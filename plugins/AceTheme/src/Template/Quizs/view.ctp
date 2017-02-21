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
    <h3><?= $quiz->candidate->id? $this->Html->link($quiz->candidate->first_name.' '.$quiz->candidate->last_name, ['controller' => 'Candidates', 'action' => 'view', $quiz->candidate->id]) : '' ?></h3>
    <br/>
    <table class="table vertical-table">
<!--        <tr>-->
<!--            <th scope="row">--><?//= __('candidate') ?><!--</th>-->
<!--            <td></td>-->
<!--        </tr>-->
        <tr>
            <th scope="row"><?= __('quiz_date') ?></th>
            <td><?= (!is_null($quiz->quiz_date))?$quiz->quiz_date->format('Y-m-d h:i:s'):"---" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('template_name') ?></th>
            <td><?= $quiz->examstemplate->name ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('time') ?></th>
            <td><?= $this->Number->format($quiz->time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('total') ?></th>
            <td><?= $quiz->examstemplate->num_questions ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('score') ?></th>
            <td><?= $this->Number->format($quiz->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('status') ?></th>
            <td><?= $this->IndexHelper->status($quiz->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('code') ?></th>
            <td><?= $this->Text->autoParagraph(h($quiz->code)); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= $quiz->url//$this->Html->link($quiz->url,['controller'=>'Quizs','action'=>'test',$quiz->url],['target'=>'_blank']); ?></td>
        </tr>
    </table>
</div>

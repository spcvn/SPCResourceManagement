<div class="page-header">
    <h1>
        <?= __('question')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('question_detail')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-md-6">
        <h4><?= __('section')?>: <?= h($question->section); ?> </h4>
        <div class="content-question">
            <h4><?= __('question') ?></h4>
            <article>
                <?= $this->Text->autoParagraph(h($question->content)); ?>
            </article>
        </div>
    </div>
    <div class="col-md-6">
        <h4><?= __('answers') ?></h4>
        <?php $i=1; if (!empty($question->answers)): ?>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center" width="50" scope="col"><?= __('No.') ?></th>
                    <th scope="col"><?= __('answer') ?></th>
                    <th class="center" width="100" scope="col"><?= __('Is Correct') ?></th>
                    <th class="center" scope="col" width="100"><?= __('Is Delete') ?></th>
                    <th class="center" scope="col" class="actions"><?= __('actions') ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($question->answers as $answers): ?>
                    <tr>
                        <td class="center"><?= h($i++) ?></td>
                        <td><?= h($answers->answer) ?></td>
                        <td class="center"><?= ($answers->is_correct==0)?'<i class="f20 text-danger fa fa-remove"></i>':'<i class="f20 text-success fa fa-check"></i>' ?></td>
                        <td class="center"><?= ($answers->is_delete==0)?'':'<i class="f20 text-success fa fa-check"></i>' ?></td>
                        <td class="actions center">
                            <div class="btn-group">
                                <?= $this->Html->link(
                                    $this->Html->tag('i','',['class'=>'ace-icon fa fa-pencil']),
                                    ['controller' => '','action' => '#', $question->id],
                                    ['class'=>'btn btn-xs btn-info','title'=>__('Edit'),'escape'=>false]) ?>
                                <?= $this->Html->link(
                                    $this->Html->tag('i','',['class'=>'ace-icon fa fa-trash']),
                                    ['controller' => '','action' => '#', $question->id],
                                    ['class'=>'btn btn-xs btn-danger','title'=>__('Delete'),'escape'=>false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
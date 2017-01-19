<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="questions view content">
            <p>Section: <?= h($question->section); ?> </p>
            <table class="table table-bordered table-hover vertical-table" style="max-width: 600px;">
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($question->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Section') ?></th>
                    <td><?= $this->Number->format($question->section) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td><?= $this->Number->format($question->status) ?></td>
                </tr>
            </table>
            <div class="content-question">
                <h4><?= __('Content') ?></h4>
                <?= $this->Text->autoParagraph(h($question->content)); ?>
            </div>
            <div class="related">
                <h4><?= __('Related Answers') ?></h4>
                <?php $i=1; if (!empty($question->answers)): ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center" width="50" scope="col"><?= __('No.') ?></th>
                                <th scope="col"><?= __('Answer') ?></th>
                                <th class="center" width="100" scope="col"><?= __('Is Correct') ?></th>
                                <th class="center" scope="col" width="100"><?= __('Is Delete') ?></th>
                                <th class="center" scope="col" width="200" class="actions"><?= __('Actions') ?></th>
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
                                            ['controller' => 'Answers','action' => 'edit', $question->id],
                                            ['class'=>'btn btn-xs btn-info','title'=>__('Edit'),'escape'=>false]) ?>
                                        <?= $this->Html->link(
                                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-trash']),
                                            ['controller' => 'Answers','action' => 'delete', $question->id],
                                            ['class'=>'btn btn-xs btn-danger','title'=>__('Delete'),'escape'=>false]) ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Quiz Details') ?></h4>
                <?php if (!empty($question->quiz_details)): ?>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th scope="col"><?= __('Quiz Id') ?></th>
                            <th scope="col"><?= __('Question Id') ?></th>
                            <th scope="col"><?= __('Answer Id') ?></th>
                            <th scope="col"><?= __('Is Correct') ?></th>
                            <th scope="col"><?= __('Sort') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($question->quiz_details as $quizDetails): ?>
                            <tr>
                                <td><?= h($quizDetails->quiz_id) ?></td>
                                <td><?= h($quizDetails->question_id) ?></td>
                                <td><?= h($quizDetails->answer_id) ?></td>
                                <td><?= h($quizDetails->is_correct) ?></td>
                                <td><?= h($quizDetails->sort) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'QuizDetails', 'action' => 'view', $quizDetails->quiz_id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'QuizDetails', 'action' => 'edit', $quizDetails->quiz_id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuizDetails', 'action' => 'delete', $quizDetails->quiz_id], ['confirm' => __('Are you sure you want to delete # {0}?', $quizDetails->quiz_id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
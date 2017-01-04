<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Test Result') ?></li>
        <!--<li><?= $this->Html->link(__('New Quiz'), ['action' => 'generate']) ?></li>-->
    </ul>
</nav>
<div class="questions index large-9 medium-8 columns content">
    <h3><?= __('Quizs') ?></h3>
    <table cellpadding="0" cellspacing="0" data-col="quizs">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start','Test date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score','Test score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $cur = $this->Paginator->counter('{{start}}');
            foreach ($quizs as $quiz): ?>
            <tr>
                <td class="viewDetail" data-id="<?=$quiz->id?>"><?= $cur++ ?></td>
                <td class="viewDetail" data-id="<?=$quiz->id?>"><?= $quiz->candidate->last_name ." ". $quiz->candidate->first_name ?></td>
                <td class="viewDetail" data-id="<?=$quiz->id?>"><?= $quiz->url ?></td>
                <td class="viewDetail" data-id="<?=$quiz->id?>"><?= $this->Number->format($quiz->time). ' mins' ?></td>
                <td class="viewDetail" data-id="<?=$quiz->id?>"><?= (!is_null($quiz->quiz_date))?$quiz->quiz_date:"Not yet" ?></td>
                <td class="viewDetail" data-id="<?=$quiz->id?>"><?= $this->Number->format($quiz->score). "/" . $this->Number->format($quiz->total) ?></td>
                <td class="viewDetail" data-id="<?=$quiz->id?>"><?= $status[$quiz->status] ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-file-text-o']), ['action' => 'view', $quiz->id],['escape'=>false]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('First')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->last(__('Last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

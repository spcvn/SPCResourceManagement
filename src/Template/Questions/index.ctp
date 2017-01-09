<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Question') ?></li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link('Export Questions', ['action' => 'exportQuestion']) ?></li>
        <li><?= $this->Html->link('Export Answer', ['action' => 'exportAnswer']) ?></li>
        <li><?= $this->Html->link('Import', ['action' => 'import']) ?></li>
    </ul>
</nav>
<div class="questions index large-9 medium-8 columns content">
    <h3><?= __('Questions') ?></h3>
    <table cellpadding="0" cellspacing="0" data-col="questions">
        <thead>
            <tr>
                <th scope="col" style="width: 7%"><?= $this->Paginator->sort('id','No.') ?></th>
                <th scope="col" style="width: 73%"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col" style="width: 10%"><?= $this->Paginator->sort('section') ?></th>
                <th scope="col" style="width: 10%" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $cur = $this->Paginator->counter('{{start}}');
                 foreach ($questions as $question): 
            ?>
            <tr>
                <td class="viewDetail" data-id="<?=$question->id?>"><?= $cur++;?></td>
                <td class="viewDetail" data-id="<?=$question->id?>"><?=$question->content?></td>
                <td class="viewDetail" data-id="<?=$question->id?>"><?= $sections[$question->section] ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-file-text-o']), ['action' => 'view', $question->id],['escape'=>false]) ?>
                    <?= $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-pencil orange']), ['action' => 'edit', $question->id],['escape'=>false]) ?>
                    <?php if ($question->status == 1): ?>
                    <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fa fa-check green']), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to deactive # {0}?', $question->id),'escape'=>false]) ?>
                    <?php else: ?>
                    <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fa fa-times red']), ['action' => 'active', $question->id], ['confirm' => __('Are you sure you want to active # {0}?', $question->id),'escape'=>false]) ?>
                    <?php endif; ?>
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
        <p><?= $this->Paginator->counter('{{start}}') ?></p>
    </div>
</div>

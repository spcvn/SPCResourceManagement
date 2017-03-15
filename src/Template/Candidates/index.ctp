<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('CANDIDATE') ?></li>
        <li><?= $this->Html->link(__('Add Candidate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Export Candidate List'), ['action' => 'export']) ?></li>
    </ul>
</nav>

<div class="candidates index large-9 medium-8 columns content">

    <h3><?= __('Candidates') ?></h3>
    <table cellpadding="0" cellspacing="0" data-col="candidates">
        <thead>
            <tr>
                <th scope="col" style="width: 3%"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" style="width: 35%"><?= $this->Paginator->sort('last_name','Name') ?></th>
                <th scope="col" style="width: 20%"><?= $this->Paginator->sort('birth_date','DOB') ?></th>
                <th scope="col" style="width: 15%"><?= $this->Paginator->sort('mobile',"Contact") ?></th>
                <th scope="col" style="width: 10%"><?= $this->Paginator->sort('position',"Applied position") ?></th>
                <th scope="col" style="width: 17%" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $cur = $this->Paginator->counter('{{start}}');
            foreach ($candidates as $candidate): 
                $fullname = h($candidate->first_name)." ".h($candidate->last_name);
            ?>
            
            <tr>
                <td class="viewDetail" data-id="<?=$candidate->id?>"><?= $cur++?></td>
                <td class="viewDetail" data-id="<?=$candidate->id?>"><div id="linebreak"><?= $fullname ?></td>
                <td class="viewDetail" data-id="<?=$candidate->id?>"><div id="linebreak"><?= $candidate->birth_date->format('Y-m-d'); ?></td>
                <td class="viewDetail" data-id="<?=$candidate->id?>"><div id="linebreak"><?= h($candidate->mobile) ?></td>
                <td class="viewDetail" data-id="<?=$candidate->id?>"><div id="linebreak"><?= h($candidate->position) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-file-text-o']), ['action' => 'view', $candidate->id],['escape'=>false]) ?>
                    <?= $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-pencil orange']), ['action' => 'edit', $candidate->id],['escape'=>false]) ?>
                    <?= $this->Form->postLink($this->Html->tag('i','',['class'=>'fa fa-times red']), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id),'escape'=>false]) ?>
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
</head>
<div class="candidates index content">
    <h3><?= __('Candidates') ?></h3>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('middle_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birth_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('married') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interview_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidate): ?>
            <tr>
                <td><?= $this->Number->format($candidate->id) ?></td>
                <td><?= h($candidate->first_name) ?></td>
                <td><?= h($candidate->middle_name) ?></td>
                <td><?= h($candidate->last_name) ?></td>
                <td><?= h($candidate->birth_date->format('Y-m-d')) ?></td>
                <td><?= $candidate->married ? 'Yes' : 'No' ?></td>
                <td><?= h($candidate->mobile) ?></td>
                <td><?= h($candidate->interview_date->format('Y-m-d')) ?></td>
                <td><?= $this->Number->format($candidate->score) ?></td>
                <td class="actions">
                    <div class="btn-group">
                        <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-search-plus']),
                            ['action' => 'view', $candidate->id],
                            ['class'=>'btn btn-xs btn-success','title'=>__('Show Details'),'escape'=>false]) ?>
                        <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-pencil bigger-120']),
                            ['action' => 'edit', $candidate->id],
                            ['class'=>'btn btn-xs btn-info', 'title'=>'Edit','escape'=>false]) ?>
                        <?= $this->Form->postLink(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-trash-o bigger-120']),
                            ['action' => 'delete', $candidate->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id),"class"=>'btn btn-xs btn-danger','title'=>'Delete','escape'=>false]) ?>

                    </div>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first(__('first')) ?>
            <?= $this->Paginator->prev(__('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next')) ?>
            <?= $this->Paginator->last(__('last')) ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<div class="users index content">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('No.') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name',['text'=>'Name']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('provinceid',['text'=>'Province']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('districtid',['text'=>'District']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('wardid',['text'=>'Ward']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('birth_date',['text'=>'Birthday Date']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_id',['text'=>'Candidate']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_work') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            $province[0] = "-";
            foreach ($users as $user): ;?>

            <tr>
                <td><?= $i++ ?></td>
                <td><?php echo h($user->last_name ." ". $user->middle_name ." ". $user->first_name); ?></td>
                <td><?= $province[$user->provinceid] ?></td>
                <td><?= h($user->districtid) ?></td>
                <td><?= h($user->wardid) ?></td>
                <td><?= h($user->birth_date) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->updated) ?></td>
                <td><?= $user->has('candidate') ? $this->Html->link($user->candidate->id, ['controller' => 'Candidates', 'action' => 'view', $user->candidate->id]) : '' ?></td>
                <td><?= h($user->start_work) ?></td>
                <td class="actions">
                    <div class="btn-group">
                        <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-search-plus']),
                            ['action' => 'view', $user->id],
                            ['class'=>'btn btn-xs btn-success','title'=>__('Show Details'),'escape'=>false]) ?>
                        <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-pencil bigger-120']),
                            ['action' => 'edit', $user->id],
                            ['class'=>'btn btn-xs btn-info', 'title'=>'Edit','escape'=>false]) ?>
                        <?= $this->Form->postLink(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-trash-o bigger-120']),
                            ['action' => 'delete', $user->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class'=>'btn btn-xs btn-danger', 'title'=>'Delete','escape'=>false]) ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first( __('first')) ?>
            <?= $this->Paginator->prev(__('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next')) ?>
            <?= $this->Paginator->last(__('last')) ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<div class="users index content">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center;" scope="col"><?= $this->Paginator->sort('No.') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name',['text'=>'Name']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('birth_date',['text'=>'Birthday Date']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('provinceid',['text'=>'Province']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('dept') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0;
            $province[0] = $province[1] = "-";
            foreach ($users as $user): ;?>

                <tr>
                    <td style="text-align: center;"><?= $i++ ?></td>
                    <td><?php echo h($user->last_name ." ". $user->middle_name ." ". $user->first_name); ?></td>
                    <td><?=  date("Y/m/d",strtotime(h($user->birth_date))) ?></td>
                    <td><?= $province[$user->provinceid] ?></td>
                    <td><?= h($user->dept)?></td>
                    <td><?= h($user->status) ?></td>
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
                            <?= $this->Html->link(
                                $this->Html->tag('i','',['class'=>'ace-icon fa fa-trash-o bigger-120']),
                                ['action' => 'delete', $user->id],
                                ['class'=>'btn btn-xs btn-danger  btn-delete', 'title'=>'Delete','escape'=>false]) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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
<script>
    $(document).ready(function(){
        $('.btn-delete').confirm({
            content: "Are you sure you want to delete  #<span class='exam-name'>Thao Nguyen</span>?",
            title: "",
            buttons: {
                yes: {
                    btnClass:'btn-danger',
                },
                no: {
                    keys: ['N'],
                },
            }
        });
    })
</script>
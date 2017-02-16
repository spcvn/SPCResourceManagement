<div class="page-header">
    <h1>
        Quizs
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            All test
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="quizs index content">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col" style="width: 60px; text-align: center;"><?= __('No.')?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quiz_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1; foreach ($quizs as $quiz): ?>
            <tr>
                <td style="text-align: center;"><?= $i++; ?></td>
                <td><?= $quiz->has('candidate') ? $this->Html->link($quiz->candidate->first_name.' '.$quiz->candidate->last_name, ['controller' => 'Quizs', 'action' => 'view', $quiz->id]) : '' ?></td>
                <td><?= $this->Number->format($quiz->time) ?></td>
                <td><?= h($quiz->quiz_date) ?></td>
                <td><?= $status[$quiz->status] ?></td>
                <td><?= $this->Number->format($quiz->score) ?></td>
                <td><?= $this->Number->format($quiz->total) ?></td>
                <td class="actions">
                    <div class="btn-group">
                        <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-search-plus']),
                            ['action' => 'view', $quiz->id],
                            ['class'=>'btn btn-xs btn-success','title'=>__('Show Details'),'escape'=>false]) ?>
                        <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-trash-o bigger-120 btn-delete']),
                            ['action' => 'delete', $quiz->id],
                            ['class'=>'btn btn-xs btn-danger', 'title'=>'Delete','escape'=>false]) ?>
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
<script>
    $(document).ready(function(){
        $( ".btn-delete" ).each(function(index) {
            $(this).confirm({
                content: "Are you sure to delete this item?",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y']
                    },
                    no: {
                        keys: ['N'],
                    },
                }
            });
        });
    })
</script>

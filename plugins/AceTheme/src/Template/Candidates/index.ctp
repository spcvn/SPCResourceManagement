<div class="page-header">
    <h1>
        Candidates
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            All Candidates
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="candidates index content">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;"><?= __('No').'.'?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birth_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col" class="actions"><a><?= __('actions') ?></a></th>
            </tr>
        </thead>
        <tbody>
            <?php
             $i=1; foreach ($candidates as $candidate): ?>
            <tr>
                <td style="text-align: center;"><?= $i++ ?></td>
                <td><?= h($candidate->first_name) ?></td>
                <td><?= h($candidate->last_name) ?></td>
                <td><?= h($candidate->birth_date->format('Y-m-d')) ?></td>
                <td><?= h($candidate->mobile) ?></td>
                <td><?= $candidate->position->name ?></td>
                <td class="actions" style="width: 160px;">
                    <div class="btn-group">
                        <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'fa fa-file-text-o']),
                            ['controller'=>'examstemplates','action' => 'examAssignment', $candidate->id],
                            ['class'=>'btn btn-xs btn-info','title'=>__('create_test'),'escape'=>false]) ?>
                        <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-search-plus']),
                            ['action' => 'view', $candidate->id],
                            ['class'=>'btn btn-xs btn-success','title'=>__('show_detail'),'escape'=>false]) ?>
                        <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-pencil bigger-120']),
                            ['action' => 'edit', $candidate->id],
                            ['class'=>'btn btn-xs btn-info', 'title'=>__('edit'),'escape'=>false]) ?>
                        <?= $this->Html->link($this->Html->tag('i','',['class'=>'ace-icon fa fa-trash-o bigger-120']),
                            ['action' => 'delete', $candidate->id],
                            ["class"=>'btn btn-xs btn-danger btnDelete','title'=>'Delete','escape'=>false]) ?>

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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $('.actions .btn-group .btnDelete').each(function(index) {
            $( this ).confirm({
                content: "<?=__('alert_delete_candidate')?> ",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
                        action : function () {
                            location.href = this.$target.attr('href');
                        }
                    },
                    no: {
                        keys: ['N'],
                    },
                }
            });
        });
    });
</script>
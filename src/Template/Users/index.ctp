<div class="page-header">
    <h1>
        <?= __('users')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('all_users')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="users index content">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center;" scope="col"><?= $this->Paginator->sort('no',['text'=>'No.']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name',['text'=>__('full_name')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('birth_date',['text'=>__('birthday')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('provinceid',['text'=>__('province')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('dept',['model'=>'Positions']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            $province[0] = $province[1] = "-";
            foreach ($users as $user): ;?>
            <?php $name = h($user->last_name ." ". $user->middle_name ." ". $user->first_name);?>
                <tr>
                    <td style="text-align: center;"><?= $i++ ?></td>
                    <td><?= $name ?></td>
                    <td><?=  date("Y/m/d",strtotime(h($user->birth_date))) ?></td>
                    <td><?= $province[$user->provinceid] ?></td>
                    <td><?= h($user->position->name)?></td>
                    <td><span class="label arrowed-in arrowed-in-right label-success"><?= h($user->status) ?></span></td>
                    <td class="actions">
                        <div class="btn-group">
                            <?= $this->Html->link(
                                $this->Html->tag('i','',['class'=>'ace-icon fa fa-search-plus']),
                                ['action' => 'view', $user->id],
                                ['class'=>'btn btn-xs btn-success','title'=>__('show_detail'),'escape'=>false]) ?>
                            <?= $this->Html->link(
                                $this->Html->tag('i','',['class'=>'ace-icon fa fa-pencil bigger-120']),
                                ['action' => 'edit', $user->id],
                                ['class'=>'btn btn-xs btn-info', 'title'=>__('edit'),'escape'=>false]) ?>
                            <?= $this->Html->link(
                                $this->Html->tag('i','',['class'=>'ace-icon fa fa-trash-o bigger-120']),
                                ['action' => 'delete', $user->id],
                                ['class'=>'btn btn-xs btn-danger  btn-delete','data-name'=>$name, 'title'=>__('delete'),'escape'=>false]) ?>
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
        var name;
        $( ".btn-delete" ).each(function(index) {
            name = $(this).attr('data-name');
            $(this).confirm({
                content: "Are you sure you want to delete: <span class='exam-name'>"+ name +"</span>?",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
                    },
                    no: {
                        keys: ['N'],
                    },
                }
            });
        });
        $('tr').click( function() {
            window.location = $(this).find('a[title="Show Detail"]').attr('href');
        }).hover( function() {
            $(this).toggleClass('hover');
        });
    })
</script>
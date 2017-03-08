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
                <th scope="col"><?= $this->Paginator->sort('dept',['model'=>__('department')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
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
                    <td><?= $this->Html->link(
                            $name,
                            ['action' => 'view', $user->id]) ?></td>
                    <td><?=  date("Y-m-d",strtotime(h($user->birth_date))) ?></td>
                    <td><?= $province[$user->provinceid] ?></td>
                    <td><?= h($user->position->name)?></td>
                    <td>
                        <label class="inline">
                            <input id="id-button-borders" <?=($user->status)==0?"checked":""?> type="checkbox" class="ace ace-switch ace-switch-6 switch-act ckb_status" data-value="<?=($user->id)?>" />

                            <span class="lbl middle"></span>
                        </label>
                    </td>

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
            <?= $this->Paginator->first(''.$this->Html->tag('i','',['class'=>'fa fa-angle-double-left']),['title'=>__('first'),'escape'=>false]) ?>
            <?= $this->Paginator->prev(''.$this->Html->tag('i','',['class'=>'fa fa-angle-left']),['title'=>__('previous'),'escape'=>false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(''.$this->Html->tag('i','',['class'=>'fa fa-angle-right']),['title'=>__('next'),'escape'=>false]) ?>
            <?= $this->Paginator->last(''.$this->Html->tag('i','',['class'=>'fa fa-angle-double-right']),['title'=>__('last'),'escape'=>false]) ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}')]) ?></p>
    </div>
</div>
<script>
    $(document).ready(function(){
        var name;
        $( ".btn-delete" ).each(function(index) {
            name = $(this).attr('data-name');
            $(this).confirm({
                content: "<?=__('Are you sure you want to delete:')?> <span class='exam-name'>"+ name +"</span>?",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
                        action: function(){
                            location.href = this.$target.attr('href');
                        }
                    },
                    no: {
                        keys: ['N'],
                    },
                }
            });
        });

        //check status
        $('.ckb_status').each(function(){
            $(this).on('click', function(){
                var data = {};
                data['id'] = $(this).attr('data-value');
                if($(this).prop('checked')){
                    data['status'] = 0;
                }else{
                    data['status'] = 1;
                }
                $.post('/users/updatestatus',data,function(res){
                    var mRes = $.parseJSON(res);
                    if(mRes.success == 'ok'){
                        $(this).removeAttr('checked');
                    }else{
                        $.confirm('Some action is not ready!');
                    }
                });
            });
        });


    })
</script>
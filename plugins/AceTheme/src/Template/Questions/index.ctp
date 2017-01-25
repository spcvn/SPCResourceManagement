<div class="page-header">
    <h1>
        <?= __('question')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('all_questions')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="questions content">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col" style="width: 60px; text-align: center;"><?= __('No.')?></th>
                    <th class="center">
                        <label id="check-all" class="checkbox-all">
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th scope="col" style="text-align: center;"><?= $this->Paginator->sort('section') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col" class="actions col-xs-2"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0; foreach ($questions as $question): ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++;?></td>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td class="center"><?= $this->Number->format($question->section) ?></td>
                        <td><?= $question->content; ?></td>
                        <td><?= $status[$question->status] ?></td>
                        <td class="actions">
                            <div class="btn-group">
                                <?= $this->Html->link(
                                    $this->Html->tag('i','',['class'=>'ace-icon fa fa-search-plus']),
                                    ['action' => 'view', $question->id],
                                    ['class'=>'btn btn-xs btn-success','title'=>__('Show Details'),'escape'=>false]) ?>
                                <?= $this->Html->link(
                                    $this->Html->tag('i','',['class'=>'ace-icon fa fa-pencil bigger-120']),
                                    ['action' => 'edit', $question->id],
                                    ['class'=>'btn btn-xs btn-info', 'title'=>'Edit','escape'=>false]) ?>
                                <?= $this->Html->link(
                                    $this->Html->tag('i','',['class'=>'ace-icon fa fa-trash-o bigger-120']),
                                    ['action' => 'delete', $question->id],
                                    ['class'=>'btn btn-xs btn-danger', 'title'=>'Delete','escape'=>false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first(__('First')) ?>
                    <?= $this->Paginator->prev(__('Previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Next')) ?>
                    <?= $this->Paginator->last(__('Last')) ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
        var check = true;
        $('#check-all .lbl').click(function () {
            if(check){
                $('.pos-rel').addClass('selected');
//            $('.pos-rel.select').find('input').prop('checked','checked');
                $('.pos-rel.selected').each(function () {
                    $(this).find('input').prop('checked','checked');
                });
                check=false;
            }else {
                $('.pos-rel').removeClass('selected');
                $('.pos-rel').each(function () {
                    $(this).find('input').prop('checked','');
                });
                check=true;
            }

        });

    });
</script>
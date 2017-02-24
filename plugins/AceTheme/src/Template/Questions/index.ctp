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
                    <th class="center">
                        <?= $this->Paginator->sort('id',__('No.')) ?>
                    </th>
                    <th scope="col" style="text-align: center;"><?= $this->Paginator->sort('section') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col" class="actions col-xs-2"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>

                <?php 
                $cur = $this->Paginator->counter('{{start}}');
                foreach ($questions as $question): ?>
                    <tr>
                        <td class="center">
                            <?=$cur++?>
                        </td>
                        <td class="center"><?= $question->section->name; ?></td>
                        <td><?= strtok($question->content, "\n"); ?></td>
                        <td style="width: 110px; vertical-align: middle;"><span class="label btn-status <?=($question->status == 1)?'label-success':'label-warning'?>"><?= $status[$question->status] ?></span></td>
                        <td class="actions">
                            <div class="btn-group">
                                <?= $this->Html->link(
                                    $this->Html->tag('i','',['class'=>'ace-icon fa fa-search-plus']),
                                    ['action' => 'view', $question->id],
                                    ['class'=>'btn btn-xs btn-success','title'=>__('show_detail'),'escape'=>false]) ?>
                                <?= $this->Html->link(
                                    $this->Html->tag('i','',['class'=>'ace-icon fa fa-pencil bigger-120']),
                                    ['action' => 'edit', $question->id],
                                    ['class'=>'btn btn-xs btn-info', 'title'=>__('edit'),'escape'=>false]) ?>
                                <?= $this->Html->link(
                                    $this->Html->tag('i','',['class'=>'ace-icon fa fa-trash-o bigger-120']),
                                    ['action' => 'delete', $question->id],
                                    ['class'=>'btn btn-xs btn-danger btn-delete', 'title'=>__('delete'),'escape'=>false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
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
    </div>
</div>
<script>
    function deleteAQuestion(){
        $( ".btn-delete" ).each(function(index) {
            $(this).confirm({
                content: "Are you sure you want to delete this question?",
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
    }
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
        deleteAQuestion();

    });
</script>
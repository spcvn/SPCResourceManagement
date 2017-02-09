<div class="page-header">
    <h1>
        <?= __('question')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('question_detail')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-md-6">
        <h4 class="header smaller lighter orange"><?= __('section')?> </h4>
        <p class="lead"><?= h($sections[$question->section_id]); ?></p>
        <div class="content-question">
            <h4 class="header smaller lighter orange"><?= __('question') ?></h4>
            <article>
                <?= $question->content ?>
            </article>
        </div>
    </div>
    <div class="col-md-6">
        <h4 class="header smaller lighter orange"><?= __('answers') ?></h4>
        <?php $i=1; if (!empty($question->answers)): ?>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center" width="50" scope="col"><?= __('No.') ?></th>
                    <th scope="col"><?= __('answer') ?></th>
                    <th class="center" width="100" scope="col"><?= __('Is Correct') ?></th>
                    <th class="center" scope="col" class="actions"><?= __('actions') ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($question->answers as $answers): ?>
                    <tr>
                        <td class="center"><?= h($i++) ?></td>
                        <td><?= h($answers->answer) ?></td>
                        <td class="center"><?= ($answers->is_correct==0)?'<i class="f20 text-danger fa fa-remove"></i>':'<i class="f20 text-success fa fa-check"></i>' ?></td>
                        <td class="actions center">
                            <div class="btn-group">
                                <?= $this->Html->link(
                                    $this->Html->tag('i','',['class'=>'ace-icon fa fa-trash']),
                                    ['action' => 'ansdelete', $answers->id],
                                    ['class'=>'btn btn-xs btn-danger btn-delete','title'=>__('Delete'),'escape'=>false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        deleteAnswer();
    });
    function deleteAnswer(){
        $( ".btn-delete" ).each(function(index) {
            $(this).confirm({
                content: "<?=__('Are you sure you want to delete this question?')?>",
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
</script>
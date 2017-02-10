<div class="page-header">
    <h1>
        <?= __('question')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('question_detail')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="action-render text-right">
    <?= $this->Html->link(
        $this->Html->tag('i','',['class'=>'fa fa-pencil']),
        ['action' => 'edit', $question->id],
        ['class'=>'btn-edit-simple', 'title'=>__('edit_this_question'),'escape'=>false]) ?>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="content-question">
            <h4 class="header smaller lighter blue"><?= __('question') ?></h4>
            <article>
                <?= $question->content ?>
            </article>
        </div>
        <div class="content-section">
            <h4 class="header smaller lighter blue"><?= __('section')?> </h4>
            <p class="lead"><?= h($sections[$question->section_id]); ?></p>
        </div>
    </div>
    <div class="col-md-6">
        <h4 class="header smaller lighter blue"><?= __('answers') ?></h4>
        <?php $i=1; if (!empty($question->answers)): ?>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center" width="50" scope="col"><?= __('No.') ?></th>
                    <th scope="col"><?= __('answer') ?></th>
                    <th class="center" width="100" scope="col"><?= __('is_correct') ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($question->answers as $answers): ?>
                    <tr>
                        <td class="center"><?= h($i++) ?></td>
                        <td><?= h($answers->answer) ?></td>
                        <td class="center"><?= ($answers->is_correct==0)?'<i class="f20 text-danger fa fa-remove"></i>':'<i class="f20 text-success fa fa-check"></i>' ?></td>
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
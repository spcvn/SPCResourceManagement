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
                <th scope="col"><?= $this->Paginator->sort('result') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 

            $i=1; foreach ($quizs as $quiz): ?>
            <tr>
                <td style="text-align: center;"><?= $i++; ?></td>
                <td><?= $quiz->has('candidate') ? $this->Html->link($quiz->candidate->first_name.' '.$quiz->candidate->last_name, ['controller' => 'Candidates', 'action' => 'view', $quiz->candidate->id]) : '' ?></td>
                <td><?= $this->Number->format($quiz->time) ?></td>
                <td><?= (!is_null($quiz->quiz_date))?$quiz->quiz_date->format('Y-m-d h:i:s'):"Not yet" ?></td>
                <td><?= $this->IndexHelper->status($quiz->status) ?></td>
                <td><?= $this->Number->format($quiz->score)."/".$quiz->examstemplate->num_questions ?></td>
                <td>
                <?php 
                    $label = "";
                    $text = "";
                    $result = $quiz->candidate->result;
                    // $results = ['0' => 'Fail', '2' => 'Pass',''=>'---'];
                    if($result == '2') { $text = "Pass"; $label = "label-success"; }
                    elseif($result == '1') { $text= "Fail"; $label = "label-inverse"; }
                    elseif($result == "") { $text= ""; $label = ""; }
                 ?>
                <span class="label <?=$label?> "><?=$text?></span></td>
                <td class="actions">
                    <div class="btn-group">
                        <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'ace-icon fa fa-search-plus']),
                            ['action' => 'view', $quiz->id],
                            ['class'=>'btn btn-xs btn-success','title'=>__('Show Details'),'escape'=>false]) ?>
                        <?php if($quiz->status==1) {
                            echo $this->Html->link(
                                $this->Html->tag('i','',['class'=>'ace-icon fa fa-cog bigger-120 ']),
                                ['controller'=>'Candidates','action' => 'result', $quiz->candidate->id],
                                ['class'=>'btn btn-white btn-primary btn-xs btn-pass', 'title'=>'Result','escape'=>false]);
                                                    } ?>
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
        var row = function(index){

            var item = $(this).parents('tr').children('td').eq(index);
            return item.text();
        }
        $( ".btn-pass" ).each(function(index) {
            $(this).confirm({
                content: "Please choose a result!",
                title: "",
                buttons: {
                    Pass: {
                        btnClass:'btn-success',
                        keys: ['P'],
                        action : function () {
                            location.href = this.$target.attr('href')+"/2";
                        }
                    },
                    False: {
                        action : function(){
                            location.href = this.$target.attr('href')+"/1";
                        },
                        keys: ['F'],
                    },
                    Cancel : {
                        btnClass:'btn-danger',
                        keys: ['C'],
                    }
                }
            });
        });
    })
</script>
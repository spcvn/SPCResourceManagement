<div class="page-header">
    <h1>
        <?= __('exam')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('exam_detail')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="exams index content">
    <div class="row">
        <div class="col-xs-12 tableTools-container">
            <?= $this->Html->link(__('add_template'),
                ['controller'=>'examstemplates','action'=>'add'],
                ['class'=>'btn btn-success','title'=>__('add_a_exam_template'),'escape'=>false]
            ); ?> 
        </div>       
    </div>        
    <div class="row">
        <div class="col-xs-12">
            <div class="table-header">
                <span><?=__('alert_result')?></span>
            </div>

            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width: 50px;" class="center">
                            <?= $this->Paginator->sort('id',__('No.')) ?>
                        </th>
                        <th><?= __('name')?></th>
                        <th><?= __('number_of_question')?></th>
                        <th class="hidden-480">
                            <?= __('duration_minute')?></th>

                        <th>
                            <?= __('section')?>
                        </th>
                        <th style="width: 150px;" class="hidden-480"><?= __('tested_assigned')?></th>

                        <th><?=__('action')?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                        $cur = $this->Paginator->counter('{{start}}');
                        foreach ($examstemplates as $examstemplate) {
                            ?>
                                <tr>
                                    <td class="center">
                                        <?=$cur++?>
                                    </td>

                                    <td>
                                        <!-- <?=$examstemplate->name?> -->
                                        <?= $this->Html->link($examstemplate->name,
                                            ['controller'=>'examstemplates','action'=>'view',$examstemplate->id],
                                            ['title'=>'View a Exam Template']
                                        ); ?> 
                                    </td>
                                    <td><?=$examstemplate->num_questions?></td>
                                    <td class="hidden-480"><?=$examstemplate->duration.' '.__('minutes')?></td>
                                    <td>
                                    <?= $this->IndexHelper->sections($examstemplate->sections); ?>
                                    </td>

                                    <td class="hidden-480">
                                        <?=isset($quizs_status[$examstemplate->id])?$quizs_status[$examstemplate->id]:0?>/<?=isset($quizs_test[$examstemplate->id])?$quizs_test[$examstemplate->id]:0?>
                                    </td>

                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons btn-group">

                                            <a class="btn btn-xs btn-success " href="<?=$this->Url->build(['action'=>'edit',$examstemplate->id])?>">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>

                                            <a class="btn btn-xs btn-danger btn-delete" href="<?=$this->Url->build(['action'=>'delete',$examstemplate->id])?>" data-name="<?=$examstemplate->name?>">
                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                            </a>
                                        </div>

                                        <div class="hidden-md hidden-lg">
                                            <div class="inline pos-rel">
                                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                    <li>
                                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
															<span class="green">
																<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
															</span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="tooltip-error btn-delete" data-rel="tooltip" title="Delete" data-name="Front-end developer">
															<span class="red">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p>Are you sure to delete template: <span class="bold" data-name="name">Front-end developer</span>?</p>
                <p></p>
            </div>
        </div>
    </div>
</div>
<!-- page specific plugin scripts -->
<?= $this->Html->script('jquery.dataTables.min.js');?>
<?= $this->Html->script('jquery.dataTables.bootstrap.min.js');?>
<?= $this->Html->script('dataTables.buttons.min.js');?>
<?= $this->Html->script('buttons.flash.min.js');?>
<?= $this->Html->script('buttons.html5.min.js');?>
<?= $this->Html->script('buttons.print.min.js');?>
<?= $this->Html->script('buttons.colVis.min.js');?>
<?= $this->Html->script('dataTables.select.min.js');?>

<!-- ace scripts -->
<?= $this->Html->script('ace-elements.min.js');?>
<?= $this->Html->script('ace.min.js');?>
<script>
    $(document).ready(function(){
        $('#dynamic-table').DataTable( {
        } );
        $('table').wrap('<div class="table-responsive"></div>');
        var name;
        $( ".btn-delete" ).each(function(index) {
            name = $(this).attr('data-name');
            $(this).confirm({
                content: "Are you sure to delete template: <span class='exam-name'>"+ name +"</span>?",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
                        action : function(){
                            location.href = this.$target.attr('href');
                        }
                    },
                    no: {
                        keys: ['N'],
                    },
                }
            });
        });
    })
</script>

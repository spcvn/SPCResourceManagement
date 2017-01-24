<div class="exams index content">
    <div class="search-exams-form">
        <?= $this->Form->create() ?>
        <?php
        echo $this->Form->input('', ['type'=>'text','placeholder'=>__('template_name')]);
        echo $this->Form->input('', ['type'=>'text','placeholder'=>__('section')]);
        ?>
        <?= $this->Form->button($this->Html->tag('i','',['class'=>'fa fa-search']).__(' search')) ?>
        <?= $this->Form->end() ?>

    </div>
    <div class="action-tabs">
        <?= $this->Html->link(
            __('new_template').' +',
            ['controller'=>'exams','action'=>'add'],
            ['class'=>'btn btn-success btn-add-temp']
        ); ?>
    </div>
    <table class="table table-blue table-bordered table-hover">
        <thead>
        <tr>
            <th style="width: 50px; text-align: center;"><?= __('No.')?></th>
            <th><?= __('template_name')?></th>
            <th style="width: 150px; text-align: center;"><?= __('number_of_question') ?></th>
            <th style="width: 150px; text-align: center;"><?= __('duration')?> (minute)</th>
            <th><?= __('Section')?></th>
            <th style="text-align: center;"><?= __('tested')?></th>
            <th style="text-align: center;"><?= __('action')?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="text-align: center;">1</td>
            <td>Front-end developer</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;">20</td>
            <td>HTML: 50%; CSS: 25%; JAVASCRIPT: 25%</td>
            <td style="text-align: center;">0/10</td>
            <td style="text-align: center;">
                <div class="btn-group">
                    <a href="#" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                    <a href="#" class="btn btn-xs btn-danger btn-delete" data-name="Front-end developer"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">2</td>
            <td>Back-end developer</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;">20</td>
            <td>PHP: 45%; SERVER: 20%; SQL: 20%; HOSTING: 15%</td>
            <td style="text-align: center;">0/5</td>
            <td style="text-align: center;">
                <div class="btn-group">
                    <a href="#" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                    <a href="#" class="btn btn-xs btn-danger btn-delete" data-name="Back-end developer"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">3</td>
            <td>Designer</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;">20</td>
            <td>Photoshop: 50%; Adobe Illustrator: 30%; Html: 10%; Css:10%;</td>
            <td style="text-align: center;">0/10</td>
            <td style="text-align: center;">
                <div class="btn-group">
                    <a href="#" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                    <a href="#" class="btn btn-xs btn-danger btn-delete" data-name="Designer"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev(__('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next')) ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
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
<script>
    $(document).ready(function(){
        $('.btn-delete').confirm({
            content: "Are you sure to delete template: <span class='exam-name'>Front-end developer</span>?",
            title: "",
            buttons: {
                yes: {
                    btnClass:'btn-danger',
                },
                no: {
                    keys: ['N'],
                },
            }
        });
    })
</script>


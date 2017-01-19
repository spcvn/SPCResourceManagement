<div class="exams index content">
    <div class="search-exams-form">
        <?= $this->Form->create() ?>
        <?php
        echo $this->Form->input('', ['type'=>'text','placeholder'=>'Template Name']);
        echo $this->Form->input('', ['type'=>'text','placeholder'=>'Section']);
        ?>
        <?= $this->Form->button($this->Html->tag('i','',['class'=>'fa fa-search']).__(' Search')) ?>
        <?= $this->Form->end() ?>

    </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th style="width: 50px; text-align: center;"><?= __('No.')?></th>
            <th><?= __('Template name')?></th>
            <th style="width: 100px; text-align: center;"><?= __('Num of question') ?></th>
            <th style="width: 100px; text-align: center;"><?= __('Duration (minute)')?></th>
            <th><?= __('Section')?></th>
            <th style="text-align: center;"><?= __('Tested')?></th>
            <th style="text-align: center;"><?= __('Action')?></th>
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
                    <a href="#" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">2</td>
            <td>Front-end developer</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;">20</td>
            <td>PHP: 45%; SERVER: 20%; SQL: 20%; HOSTING: 15%</td>
            <td style="text-align: center;">0/5</td>
            <td style="text-align: center;">
                <div class="btn-group">
                    <a href="#" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                    <a href="#" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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

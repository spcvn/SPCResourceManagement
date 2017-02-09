<div class="page-header">
    <h1>
        <?= __('exam')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            All question
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="exams view content">
    <h3><?= h($exam->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($exam->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($exam->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Questions') ?></th>
            <td><?= $this->Number->format($exam->num_questions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Delete') ?></th>
            <td><?= $this->Number->format($exam->is_delete) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($exam->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Date') ?></th>
            <td><?= h($exam->create_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Date') ?></th>
            <td><?= h($exam->update_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Section') ?></h4>
        <?= $this->Text->autoParagraph(h($exam->section)); ?>
    </div>
</div>

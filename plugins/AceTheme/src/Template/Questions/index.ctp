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
                <?php $i=1; foreach ($questions as $question): ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++;?></td>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td class="center"><?= $question->section; ?></td>
                        <td><?= $question->content; ?></td>
                        <td><span class="label label-success arrowed-in arrowed-in-right"><?= $status[$question->status] ?></span></td>
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
                                    ['class'=>'btn btn-xs btn-danger', 'title'=>__('delete'),'escape'=>false]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first(__('first')) ?>
                    <?= $this->Paginator->prev(__('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next')) ?>
                    <?= $this->Paginator->last(__('last')) ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}')]) ?></p>
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

        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header

            $('#dynamic-table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) myTable.row(row).select();
                else  myTable.row(row).deselect();
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
            var row = $(this).closest('tr').get(0);
            if(this.checked) myTable.row(row).deselect();
            else myTable.row(row).select();
        });



        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();
        });



        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
            var $row = $(this).closest('tr');
            if($row.is('.detail-row ')) return;
            if(this.checked) $row.addClass(active_class);
            else $row.removeClass(active_class);
        });

        /***************/
        $('.show-details-btn').on('click', function(e) {
            e.preventDefault();
            $(this).closest('tr').next().toggleClass('open');
            $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
        /***************/

    });
</script>
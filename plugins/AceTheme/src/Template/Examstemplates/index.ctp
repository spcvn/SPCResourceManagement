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
    <div class="action-tabs text-right">
        <?= $this->Html->link(
            __('new_template').' +',
            ['controller'=>'examstemplates','action'=>'add'],
            ['class'=>'btn btn-success btn-add-temp']
        ); ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="table-header">
                <?=__('Results for "Latest Template"')?>
            </div>

            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
            <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th><?= __('template_name')?></th>
                        <th><?= __('number_of_question')?></th>
                        <th class="hidden-480">
                            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                            <?= __('duration_minute')?></th>

                        <th>
                            <?= __('section')?>
                        </th>
                        <th class="hidden-480"><?= __('tested')?></th>

                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    // echo "<pre>";print_r($quizs_group);
                        foreach ($examstemplates as $examstemplate) {
                            ?>
                                <tr>
                                    <td class="center">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </td>

                                    <td>
                                        <a href="#"><?=$examstemplate->name?></a>
                                    </td>
                                    <td><?=$examstemplate->num_questions?></td>
                                    <td class="hidden-480"><?=$examstemplate->duration?></td>
                                    <td>
                                    <?php
                                    foreach ($examstemplate->sections as $section) {
                                         echo " $section->name : ".$section->_joinData->ratio." %;";
                                     } 
                                    ?>
                                    </td>

                                    <td class="hidden-480">
                                        0/<?=$quizs_group[$examstemplate->id]?>
                                    </td>

                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">

                                            <a class="green" href="<?=$this->Url->build(['action'=>'edit',$examstemplate->id])?>">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>

                                            <a class="red btn-delete" href="<?=$this->Url->build(['action'=>'delete',$examstemplate->id])?>" data-name="Front-end developer">
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
<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .DataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                        { "bSortable": false },
                        null, null,null, null, null,
                        { "bSortable": false }
                    ],
                    "aaSorting": [],


                    //"bProcessing": true,
                    //"bServerSide": true,
                    //"sAjaxSource": "http://127.0.0.1/table.php"	,

                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,

                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                    //"iDisplayLength": 50


                    select: {
                        style: 'multi'
                    }
                } );



        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
            buttons: [
                {
                    "extend": "colvis",
                    "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                    "className": "btn btn-white btn-primary btn-bold",
                    columns: ':not(:first):not(:last)'
                },
                {
                    "extend": "copy",
                    "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "csv",
                    "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "excel",
                    "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "pdf",
                    "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "print",
                    "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                    "className": "btn btn-white btn-primary btn-bold",
                    autoPrint: false,
                    message: 'This print was produced using the Print button for DataTables'
                }
            ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );

        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
            defaultCopyAction(e, dt, button, config);
            $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        });


        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {

            defaultColvisAction(e, dt, button, config);


            if($('.dt-button-collection > .dropdown-menu').length == 0) {
                $('.dt-button-collection')
                    .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                    .find('a').attr('href', '#').wrap("<li />")
            }
            $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        });

        ////

        setTimeout(function() {
            $($('.tableTools-container')).find('a.dt-button').each(function() {
                var div = $(this).find(' > div').first();
                if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                else $(this).tooltip({container: 'body', title: $(this).text()});
            });
        }, 500);





        myTable.on( 'select', function ( e, dt, type, index ) {
            if ( type === 'row' ) {
                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
            }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
            if ( type === 'row' ) {
                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
            }
        } );




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



        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }
        $('table').wrap('<div class="table-responsive"></div>');
    })
</script>

<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Resource Management</span>
							Application &copy; 2016-2017
						</span>

            &nbsp; &nbsp;
            <span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->
<!-- basic scripts -->

<!--[if !IE]> -->
<?= $this->Html->script('jquery-2.1.4.min.js') ?>

<!-- <![endif]-->

<!--[if IE]>
<?= $this->Html->script('jquery-1.11.3.min.js') ?>

<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='/ace-theme/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<?= $this->Html->script('bootstrap.min.js')?>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<?= $this->Html->script('excanvas.min.js') ?>
<![endif]-->
<?= $this->Html->script('jquery-ui.custom.min.js')?>
<?= $this->Html->script('jquery.ui.touch-punch.min.js')?>
<?= $this->Html->script('jquery.easypiechart.min.js')?>
<?= $this->Html->script('jquery.sparkline.index.min.js')?>

<!-- ace scripts -->
<?= $this->Html->script('ace-elements.min.js') ?>
<?= $this->Html->script('ace.min.js') ?>

<!-- javascript ckeditor -->
<?= $this->Html->script('ckeditor/ckeditor.js') ?>
<?= $this->Html->script('customs.js') ?>

<!-- inline scripts related to this page -->
<script type="text/javascript">
        var activeMenu = '<?=$this->request->params['controller']?>';
        var activeSubMenu = '<?=$this->request->params['action']?>';
    jQuery(function($) {
        $('.easy-pie-chart.percentage').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size/10),
                animate: ace.vars['old_ie'] ? false : 1000,
                size: size
            });
        })

        $('.sparkline').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html',
                {
                    tagValuesAttribute:'data-values',
                    type: 'bar',
                    barColor: barColor ,
                    chartRangeMin:$(this).data('min') || 0
                });
        });




        $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('.tab-content')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }


        $('.dialogs,.comments').ace_scroll({
            size: 300
        });


        //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
        //so disable dragging when clicking on label
        var agent = navigator.userAgent.toLowerCase();
        if(ace.vars['touch'] && ace.vars['android']) {
            $('#tasks').on('touchstart', function(e){
                var li = $(e.target).closest('#tasks li');
                if(li.length == 0)return;
                var label = li.find('label.inline').get(0);
                if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
            });
        }

        $('#tasks').sortable({
                opacity:0.8,
                revert:true,
                forceHelperSize:true,
                placeholder: 'draggable-placeholder',
                forcePlaceholderSize:true,
                tolerance:'pointer',
                stop: function( event, ui ) {
                    //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                    $(ui.item).css('z-index', 'auto');
                }
            }
        );
        $('#tasks').disableSelection();
        $('#tasks input:checkbox').removeAttr('checked').on('click', function(){
            if(this.checked) $(this).closest('li').addClass('selected');
            else $(this).closest('li').removeClass('selected');
        });


        //show the dropdowns on top or bottom depending on window height and menu position
        $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
            var offset = $(this).offset();

            var $w = $(window)
            if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                $(this).addClass('dropup');
            else $(this).removeClass('dropup');
        });

    })
</script>
</body>
</html>

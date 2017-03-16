<div class="page-header">
    <h1>
        <?= __('role')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('Authorization for each account')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="role-form">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar Message -->
            <div class="stacked">
                <p class="label-inverse"><i class="fa fa-diamond"></i> <?= __('config')?></p>
            </div>
            <div class="list-group menu-message permission_group">
                <a href="#roles" id-tab="tabRoles" class="list-group-item  list-group-item_permission tabRoles active" data-toggle="tab">
                    <i class="fa fa-user-secret"></i> <?= __('role');?></a>
                <a href="#permissions" id-tab="tabPermissions" class="list-group-item list-group-item_permission tabPermissions" data-toggle="tab">
                    <i class="fa fa-indent"></i> <?= __('permission');?>
                </a>
            </div>
        </div><!-- ENd div .col-md-2 -->
        <div class="col-md-9">
            <div class="widget widget-tabbed">
                <!-- Nav tab -->
                <ul class="nav nav-tabs nav-justified hidden-xs">

                    <li id-tab="tabRoles"  class="tabRoles active list-group-item_permission"><a href="#roles" data-toggle="tab"><i class="fa fa-user-secret"></i> <?= __('role');?></a></li>
                    <li id-tab="tabPermissions" class="tabPermissions list-group-item_permission"><a href="#permissions" data-toggle="tab"><i class="fa fa-indent"></i> <?= __('permission');?></a></li>
                </ul>
                <!-- End nav tab -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Tab Role -->
                    <?php echo $this->element('Configuration/role') ?>
                    <!-- End Tab Permission -->
                    <?php echo $this->element('Configuration/permission') ?>
                    <!-- Tab user activities -->
                    <!-- End Tab user activities -->
                    <!-- Tab user messages -->
                    <!-- End Tab user messages -->
                </div><!-- End div .tab-content -->
            </div><!-- End div .box-info -->
        </div>
    </div>
</div>
<?php $this->Html->scriptStart(array('block' => 'scriptBlock')); ?>

$(document).ready(function(){
    $(document).on("click", ".list-group-item_permission", function() {
        var name =  $(this).attr('id-tab');
        $(".list-group-item_permission").removeClass("active");
            $('.'+name).addClass("active");
    });

    $('#roleList tr').each(function(){
        $(this).on('click',function(){
            $('#addRole').addClass('hasChanged');
            $('#addRole input[name=id]').val($(this).attr('data-id'));
            $('#addRole').attr('action','/roles/edit');
            var name = $(this).find('td:nth-child(2)').attr('data-name');
            var alias = $(this).find('td:nth-child(3)').attr('data-alias');
            $('#addRole #name').val(name);
            $('#addRole #display_name').val(alias); 
        });
    });
    $('#addRole .btn-cancel').on('click', function(){
        $('#addRole').removeClass('hasChanged');
        $('#addRole input[name=id]').val('');
        $('#addRole').attr('action','/roles/add');
    });

    $('form#addRole').validate();
});

<?php $this->Html->scriptEnd();?>
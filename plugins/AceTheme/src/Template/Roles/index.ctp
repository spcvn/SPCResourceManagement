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
            <div class="btn-group new-message-btns stacked">
                <p class="btn btn-success btn-lg col-xs-12"><?__('config')?></p>
            </div>
            <div class="list-group menu-message permission_group">
                <a href="#roles" id="tabRoles" class="list-group-item  list-group-item_permission tabRoles active" data-toggle="tab"><i class="icon-inbox"></i> <?= __('role');?></a>
                <a href="#permissions"   id="tabPermissions" class="list-group-item list-group-item_permission tabPermissions" data-toggle="tab"><i class="icon-export"></i> <?= __('permission');?></a>
            </div>
        </div><!-- ENd div .col-md-2 -->
        <div class="col-sm-9">
            <div class="widget widget-tabbed">
                <!-- Nav tab -->
                <ul class="nav nav-tabs nav-justified">

                    <li id="tabRoles"  class="tabRoles active list-group-item_permission"><a href="#roles" data-toggle="tab"><i class="fa fa-user"></i> <?= __('role');?></a></li>
                    <li id="tabPermissions" class="tabPermissions list-group-item_permission"><a href="#permissions" data-toggle="tab"><i class="fa fa-pencil"></i> <?= __('permission');?></a></li>
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
$(document).on("click", ".list-group-item_permission", function() {
var name =  $(this).prop('id');
$(".list-group-item_permission").removeClass("active");
$('.'+name).addClass("active");
});


<?php $this->Html->scriptEnd();?>
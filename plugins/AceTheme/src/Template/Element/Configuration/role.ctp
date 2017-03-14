<div class="tab-pane animated active fadeInRight" id="roles">
    <div class="row">
        <div class="col-sm-4 " style="margin-left: 20px;">
            <h4><strong> <?=__("role")?> </strong></h4>
            <hr />

                <form role="form" method="post" id="addRole" name="addRole" action="/roles/add">
                    <input type="hidden" value="resetpass" id="hdnmode" name="hdnmode">
                    <div class="form-group">
                        <label for="tblName"><?php echo __('role_name');?></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="<?=__('placeholder_role_name')?>">
                    </div>
                    <div class="form-group">
                        <label for="tblDisplayName"><?php echo __('role_display_name');?></label>
                            <input type="text" class="form-control" id="display_name" name="display_name" placeholder="<?=__('placeholder_role_display_name')?>">
                    </div>
                    <button type="submit" class="btn btn-success"><?=__("submit")?></button>
                </form>
        </div>
        <div class="col-sm-7">
            <div class="widget">
                    <h4><strong><?=__("role_list")?></strong></h4>
                    <hr />
                <!-- <div class="widget-header  btn-group " >
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                    </div>
                </div> -->
                <div class="widget-content">
                    <div class="table-responsive">
                        <table data-sortable class="table">
                            <thead>
                            <tr>
                                <th><?=__("stt")?></th>
                                <th><?=__("name")?></th>
                                <th><?=__("alias")?></th>
                                <th data-sortable="false"><?=__("action")?></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($roles as $key => $role): ?>
                                <tr>
                                    <td><?php echo $key+1;?></td>
                                    <td><strong><?php echo $role->name;?></strong></td>
                                    <td><strong><?php echo $role->display_name;?></strong></td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <?php echo $this->Html->link($this->Html->tag('i', '', array('class'=>'fa fa-edit')),array('controller'=>'users','action'=>'edit','edit_dep'),array('style' => 'margin-right:4px;' ,'class'=>'btn btn-default','title'=>'Edit','data-toggle'=>"tooltip",'escape' => false ))?>
                                            <?php echo $this->Html->link($this->Html->tag('i', '', array('class'=>'fa fa-remove')),array('controller'=>'users','action'=>'delete','del_dep'),array('class'=>'btn btn-danger','title'=>'Delete','data-toggle'=>"tooltip",'escape' => false ))?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

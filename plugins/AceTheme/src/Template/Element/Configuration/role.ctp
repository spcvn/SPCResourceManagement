<div class="tab-pane fade in active" id="roles">
    <div class="row">
        <div class="col-sm-5">
            <h4><strong> <?=__("role")?> </strong></h4>
            <hr/>
            <br/>

            <form role="form" method="post" id="addRole" name="addRole" action="/roles/add">
                <input type="hidden" value="resetpass" id="hdnmode" name="hdnmode">
                <div class="form-group required">
                    <label for="tblName"><?php echo __('role_name');?></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="<?=__('placeholder_role_name')?>" required>
                </div>
                <div class="form-group required">
                    <label for="tblDisplayName"><?php echo __('role_display_name');?></label>
                    <input type="text" class="form-control" id="display_name" name="display_name" placeholder="<?=__('placeholder_role_display_name')?>" required>
                </div>
                <div class="row Actions">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-info"><?=__("create")?></button>
                    </div>
                </div>
                <div class="row Actions hasChanged">
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-info btn-save"><?=__("save")?></button>
                    </div>
                    <div class="col-xs-6 text-right">
                        <button type="reset" class="btn btn-cancel"><?=__("cancel")?></button>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-sm-7">
            <div class="widget">
                <h4><strong><?=__("role_list")?></strong></h4>
                <hr />
                <div class="widget-content">
                    <div class="table-responsive">
                        <table id="roleList" data-sortable class="table table-hover table-inverse">
                            <thead>
                                <tr>
                                    <th><?=__('no')?></th>
                                    <th><?=__('name')?></th>
                                    <th><?=__('alias')?></th>
                                    <th data-sortable="false"><?=__("action")?></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($roles as $key => $role): ?>
                                <tr>
                                    <td><?php echo $key+1;?></td>
                                    <td data-name="<?php echo $role->name;?>"><strong><?php echo $role->name;?></strong></td>
                                    <td data-alias="<?php echo $role->display_name;?>"><strong><?php echo $role->display_name;?></strong></td>
                                    <td>
                                        <div class="btn-group">
                                            <?php echo $this->Html->link($this->Html->tag('i', '', array('class'=>'fa fa-edit')),array('controller'=>'users','action'=>'edit','edit_dep'),array('style' => 'margin-right:4px;' ,'class'=>'btn btn-xs btn-success','title'=>'Edit','data-toggle'=>"tooltip",'escape' => false ))?>
                                            <?php echo $this->Html->link($this->Html->tag('i', '', array('class'=>'fa fa-trash')),array('controller'=>'users','action'=>'delete','del_dep'),array('class'=>'btn btn-xs btn-danger','title'=>'Delete','data-toggle'=>"tooltip",'escape' => false ))?>
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

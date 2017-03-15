<div class="tab-pane fade" id="permissions">
    <h4><strong> <?=__('manage_permission')?></strong></h4>
    <hr/>
    <div class="widget">
        <div class="widget-content">
            <form method="post" href="/configuration">
                <input type="hidden" id="mode" name="mode" value="1">
                <div class="table-responsive">
                    <table class="table table-bordered table-inverse">
                        <thead>
                            <tr >
                                <th><?=__('permission')?></th>
                                <?php foreach ($roles as $key => $role): ?>
                                    <th><?php echo $role->display_name;?></th>
                                <?php endforeach;?>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($listAcl as $key => $acls): ?>
                            <tr class="btn-success" <?php echo ($key === 'AuthMaster') ? "style='display:none;'" : ''; ?>>
                                <td><?=__($acls['alias']);?></td>
                                <?php foreach ($roles as $key1 => $role): ?>
                                    <td></td>
                                <?php endforeach;?>
                            </tr>

                            <?php foreach ($acls['roles'] as $key1 => $acl): ?>
                                <tr <?php echo ($key === 'AuthMaster') ? "style='display:none;'" : ''; ?>>
                                    <td style="padding: 20px;"><?=__($acl);?></td>
                                    <?php foreach ($roles as $key2 => $role): ?>
                                        <td>
                                            <label class="icheckbox">
                                                <input type="checkbox" <?php
                                                //$key! = action
                                                if(isset($acls['actions']['*']) or isset($acls['actions'][$key1]))
                                                {
                                                    if( @is_array($acls['actions']['*']) and in_array($role->id,$acls['actions']['*']) ){
                                                        echo 'checked';
                                                    }elseif(isset($acls['actions'][$key1]) and in_array($role->id, $acls['actions'][$key1])){
                                                        echo 'checked';
                                                    }
                                                    else
                                                        echo '';
                                                }else{
                                                    echo '';
                                                }

                                                ?> id="" name="<?php echo$acls['controller'].'['.$role->name.'][]' ?>" value="<?php echo $key1;?>">
                                            </label>
                                        </td>
                                    <?php endforeach;?>
                                </tr>
                            <?php endforeach;?>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-info"><?=__('submit')?></button>
                    </div>
                    <div class="col-xs-6 text-right">
                        <button type="reset" class="btn btn-cancel"><?=__('cancel')?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





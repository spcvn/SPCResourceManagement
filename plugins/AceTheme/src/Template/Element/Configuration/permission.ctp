<div class="tab-pane animated fadeInRight" id="permissions">
    <div class="row"  style="padding-left:25px;">
        <h4><strong> <?=__('manage_permission')?></strong></h4>
        <div class="col-sm-11 center">
            <div class="widget">
                <div class="widget-content">
                    <div class="table-responsive">
                        <form method="post" href="/configuration">
                        <input type="hidden" id="mode" name="mode" value="1">

                        <table  class="table">
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
                                <tr>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-success"><?=__('submit')?></button>
                                <button type="reset" class="btn btn-default"><?=__('cancel')?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
$arrStatus = ['1' => 'Disable', '0' => 'Active'];
?>

<div class="users view content">
    <div class="wrap-review">
        <h3 class="ttl-light"><i class="fa fa-vcard"></i> <?= h($user->first_name).' '.h($user->last_name); ?>        </h3>
        <?= $this->Html->link(
            $this->Html->tag('i','',['class'=>'fa fa-pencil bigger-120']),
            ['action' => 'edit', $user->id],
            ['class'=>'btn-edit-simple', 'title'=>'Edit Detail','escape'=>false]) ?>
        <div class="row">
            <div class="col-sm-7">
                <table class="table-review table-hover vertical-table">
                    <tr>
                        <th style="width: 150px;" scope="row"><?= __('Username') ?></th>
                        <td>:</td>
                        <td><?= h($user->username) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('First Name') ?></th>
                        <td>:</td>
                        <td><?= h($user->first_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Last Name') ?></th>
                        <td>:</td>
                        <td><?= h($user->last_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td>:</td>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Dept') ?></th>
                        <td>:</td>
                        <td><?= h($user->position->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Mobile') ?></th>
                        <td>:</td>
                        <td><?= h($user->mobile) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Region') ?></th>
                        <td>:</td>
                        <td><?= h($user->addr01) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td>:</td>
                        <td><?= h($user->province[0].", ".$user->district[0].", ".$user->ward[0]) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td>:</td>
                        <td><?=(isset($user->created))?$user->created->format('Y-m-d H:i'):"" ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Updated') ?></th>
                        <td>:</td>
                        <td><?= (isset($user->updated))?$user->updated->format('Y-m-d H:i'):"" ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Birth Date') ?></th>
                        <td>:</td>
                        <td><?= h($user->birth_date->format('Y-m-d')) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Status') ?></th>
                        <td>:</td>
                        <td><?= h($arrStatus[$user->status]) ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-5">
                <?= $this->Html->image('/images/avatars/avatar_user.png',['alt'=>''])?>
            </div>
        </div>

    </div>
</div>

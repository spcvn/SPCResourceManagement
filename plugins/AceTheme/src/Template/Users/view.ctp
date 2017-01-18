<?php
$arrStatus = ['0' => 'Disable', '1' => 'Active'];
$arrDept = ['it'=>"IT",'hr'=>"HR",'admin'=>'Admin'];
?>
<div class="users view content">
    <h3 class="ttl-light"><?= h($user->first_name).' '.h($user->last_name); ?></h3>

    <table class="table-review table-hover vertical-table">
        <tr>
            <th style="width: 150px;" scope="row"><?= __('Username') ?></th>
            <td>:</td>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td>:</td>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td>:</td>
            <td><?= h($arrStatus[$user->status]) ?></td>
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
            <th scope="row"><?= __('Dept') ?></th>
            <td>:</td>
            <td><?= h((isset($arrDept[$user->dept]))?$arrDept[$user->dept]:$user->dept) ?></td>
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
    </table>
</div>

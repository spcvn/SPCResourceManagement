<div class="page-header">
    <h1>
        <?= __('users')?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?= __('profile_user')?>
        </small>
    </h1>
</div><!-- /.page-header -->
<?php
$arrStatus = ['1' => 'Disable', '0' => 'Active'];
?>

<div class="users view content">
    <div class="wrap-review">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="ttl-light"><i class="fa fa-vcard"></i> <?= h($user->first_name).' '.h($user->last_name); ?> </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <?= $this->Html->image('/images/avatars/avatar_user.png',['alt'=>''])?>
                <div class="actions">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'fa fa-pencil bigger-120']),
                        ['action' => 'edit', $user->id],
                        ['class'=>'btn-edit-simple', 'title'=>'Edit Detail','escape'=>false]) ?>
                </div>
            </div>
            <div class="col-sm-8">
                <ul class="inbox-tabs nav nav-tabs tab-size-bigger tab-space-1">
                    <li class="active"><a href="#generalUser" data-toggle="tab" data-target="#generalUser" aria-expanded="true">General</a></li>
                    <li><a href="#contactUser" data-toggle="tab" data-target="#contactUser" aria-expanded="true">Contact</a></li>
                </ul>
                <div class="tab-content">
                    <div id="generalUser" class="tab-pane fade in active">
                        <table class="table-review table-hover vertical-table">
                            <tr>
                                <th style="width: 100px;" scope="row"><?= __('Username') ?></th>
                                <td>:</td>
                                <td><?= h($user->username) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('first_name') ?></th>
                                <td>:</td>
                                <td><?= h($user->first_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('last_name') ?></th>
                                <td>:</td>
                                <td><?= h($user->last_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('birthday') ?></th>
                                <td>:</td>
                                <td><?= h($user->birth_date->format('Y-m-d')) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('department') ?></th>
                                <td>:</td>
                                <td><?= h($user->position->name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('status') ?></th>
                                <td>:</td>
                                <td><?= h($arrStatus[$user->status]) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('created') ?></th>
                                <td>:</td>
                                <td><?=(isset($user->created))?$user->created->format('Y-m-d H:i'):"" ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('updated') ?></th>
                                <td>:</td>
                                <td><?= (isset($user->updated))?$user->updated->format('Y-m-d H:i'):"" ?></td>
                            </tr>

                        </table>
                    </div>
                    <div id="contactUser" class="tab-pane fade">
                        <table class="table-review table-hover vertical-table">
                            <tr>
                                <th style="width: 90px;" scope="row"><?= __('email') ?></th>
                                <td>:</td>
                                <td><?= h($user->email) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('mobile') ?></th>
                                <td>:</td>
                                <td><?= h($user->mobile) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Address') ?></th>
                                <td>:</td>
                                <td><?= h($user->addr01) ?> <?= h(@$user->province[0].", ".@$user->district[0]->type.' '.@$user->district[0]->name.", ".@$user->ward[0]->type.' '.@$user->ward[0]->name) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

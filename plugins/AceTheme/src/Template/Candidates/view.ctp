<div class="page-header">
    <h1>
        Candidates
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Profile Candidate
        </small>
    </h1>
</div><!-- /.page-header -->
<?php $results = ['0' => 'Fail', '2' => 'Pass',''=>'---']; ?>
<div class="users view content">
    <div class="wrap-review">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="ttl-light"><i class="fa fa-vcard"></i> <?= h($candidate->first_name).' '.h($candidate->last_name); ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <?= $this->Html->image('/images/avatars/avatar_user.png',['alt'=>''])?>
                <div class="actions">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'fa fa-pencil bigger-120']),
                        ['action' => 'edit', $candidate->id],
                        ['class'=>'btn-edit-simple', 'title'=>__('edit'),'escape'=>false]) ?>
                    <a href="#" class="btn-simple btn-create-test" title="<?= __('create_test');?>"><i class="fa fa-file-o"></i></a>
                    <a href="#" class="btn-simple btn-member" title="<?= __('member_of_spc')?>" ><i class="fa fa-user-o"></i></a>
                </div>
            </div>
            <div class="col-sm-8">
                <ul class="inbox-tabs nav nav-tabs tab-size-bigger tab-space-1">
                    <li class="active"><a href="#generalCan" data-toggle="tab" data-target="#generalCan" aria-expanded="true">General</a></li>
                    <li><a href="#contactCan" data-toggle="tab" data-target="#contactCan" aria-expanded="true">Contact</a></li>
                    <li><a href="#interviewCan" data-toggle="tab" data-target="#interviewCan" aria-expanded="true">Interview Info</a></li>
                </ul>
                <div class="tab-content">
                    <div id="generalCan" class="tab-pane fade in active">
                        <table class="table-review table-hover vertical-table">
                            <tr>
                                <th style="width: 130px;" scope="row"><?= __('first_name') ?></th>
                                <td style="width: 10px;">:</td>
                                <td><?= h($candidate->first_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('middle_name') ?></th>
                                <td>:</td>
                                <td><?= h($candidate->middle_name) ?></td>
                            </tr>

                            <tr>
                                <th scope="row"><?= __('last_name') ?></th>
                                <td>:</td>
                                <td><?= h($candidate->last_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('birthday') ?></th>
                                <td>:</td>
                                <td><?= h($candidate->birth_date->format('Y-m-d')) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('married_status') ?></th>
                                <td>:</td>
                                <td><?= h($candidate->married==0?"Single":"Married") ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('position') ?></th>
                                <td>:</td>
                                <td><?= h($candidate->position->name) ?></td>
                            </tr>

                        </table>
                    </div>
                    <div id="contactCan" class="tab-pane fade">
                        <table class="table-review table-hover vertical-table">
                            <tr>
                                <th style="width: 90px;" scope="row"><?= __('email') ?></th>
                                <td style="width: 10px;">:</td>
                                <td><?= h($candidate->email) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('mobile') ?></th>
                                <td>:</td>
                                <td><?= h($candidate->mobile) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('address') ?></th>
                                <td>:</td>
                                <td><?= h($candidate->addr01.", ".$candidate->province[0].", ".$candidate->district[0].", ".$candidate->ward[0]) ?></td>
                            </tr>

                        </table>
                    </div>
                    <div id="interviewCan" class="tab-pane fade">
                        <table class="table-review table-hover vertical-table">
                            <tr>
                                <th style="width: 130px;" scope="row"><?= __('interview_date') ?></th>
                                <td style="width: 10px;">:</td>
                                <td><?= h($candidate->interview_date->format('Y-m-d H:i')) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('expected_salary') ?></th>
                                <td>:</td>
                                <td><?= h($candidate->expected_salary) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('score') ?></th>
                                <td>:</td>
                                <td><?= h($candidate->score) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('result') ?></th>
                                <td>:</td>
                                <td><?= h($results[$candidate->result]) ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
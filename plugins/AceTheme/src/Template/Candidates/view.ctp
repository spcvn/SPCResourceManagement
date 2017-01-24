<?php $results = ['0' => 'Fail', '2' => 'Pass',''=>'---']; ?>
<div class="users view content">
    <div class="wrap-review">
        <h3 class="ttl-light"><i class="fa fa-vcard"></i> <?= h($candidate->first_name).' '.h($candidate->last_name); ?>        </h3>
        <?= $this->Html->link(
            $this->Html->tag('i','',['class'=>'fa fa-pencil bigger-120']),
            ['action' => 'edit', $candidate->id],
            ['class'=>'btn-edit-simple', 'title'=>__('edit'),'escape'=>false]) ?>
        <div class="row">
            <div class="col-sm-7">
                <table class="table-review table-hover vertical-table">
                    <tr>
                        <th scope="row"><?= __('first_name') ?></th>
                        <td>:</td>
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
                        <th scope="row"><?= __('married_status') ?></th>
                        <td>:</td>
                        <td><?= h($candidate->married==0?"Single":"Married") ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('email') ?></th>
                        <td>:</td>
                        <td><?= h($candidate->email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('mobile') ?></th>
                        <td>:</td>
                        <td><?= h($candidate->mobile) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('region') ?></th>
                        <td>:</td>
                        <td><?= h($candidate->province[0].", ".$candidate->district[0].", ".$candidate->ward[0]) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('address') ?></th>
                        <td>:</td>
                        <td><?= h($candidate->addr01) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('birthday') ?></th>
                        <td>:</td>
                        <td><?= h($candidate->birth_date->format('Y-m-d')) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('interview_date') ?></th>
                        <td>:</td>
                        <td><?= h($candidate->interview_date->format('Y-m-d H:i')) ?></td>
                    </tr>

                    <tr>
                        <th scope="row"><?= __('score') ?></th>
                        <td>:</td>
                        <td><?= h($candidate->score) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('expected_salary') ?></th>
                        <td>:</td>
                        <td><?= h($candidate->expected_salary) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('start_work') ?></th>
                        <td>:</td>
                        <td><?= h($candidate->start_work) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('result') ?></th>
                        <td>:</td>
                        <td><?= h($results[$candidate->result]) ?></td>
                    </tr>

                </table>
            </div>
            <div class="col-sm-5">
                <?= $this->Html->image('/images/avatars/avatar_user.png',['alt'=>''])?>
            </div>
        </div>

    </div>
</div>
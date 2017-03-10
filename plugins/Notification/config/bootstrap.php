<?php
use Cake\Core\Configure;
Configure::write('Notification.Templates.Default', [
    'title' => ':title',
    'fromUser' => ':username',
    'body' => ':body',
    'link' => ':link'
]);
Configure::write('Notification.Templates.Request', [
    ADD_REQUEST_BY_STAFF => 'create_new_request',
    EDIT_REQUEST_BY_STAFF => 'update_request',
    ADD_REQUEST_BY_SUB_MANAGE => 'create_new_request',
    EDIT_REQUEST_BY_SUB_MANAGE => 'update_request',
    ADD_REQUEST_BY_MANAGE => 'create_new_request',
    EDIT_REQUEST_BY_MANAGE => 'update_request',
    APPROVE_REQUEST_BY_SUB_MANAGE => 'approved_request',
    REJECT_REQUEST_BY_SUB_MANAGE => 'rejected_request',
    RETURN_REQUEST_BY_SUB_MANAGE => 'returned_request',
    APPROVE_REQUEST_BY_MANAGE => 'approved_request',
    REJECT_REQUEST_BY_MANAGE => 'rejected_request',
    RETURN_REQUEST_BY_MANAGE => 'returned_request',
    APPROVE_REQUEST_BY_TOP => 'approved_request',
    REJECT_REQUEST_BY_TOP => 'rejected_request',
    RETURN_REQUEST_BY_TOP => 'returned_request',
    ADD_REQUEST_BY_TOP => '',
]);
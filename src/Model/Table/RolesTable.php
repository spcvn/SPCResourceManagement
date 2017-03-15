<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

class RolesTable extends Table
{


    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tbl_master_roles');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsToMany('user', [
            'through' => 'RoleUsers',
            'className' => 'Users',
            'foreignKey' => 'role_id',
            'targetForeignKey' => 'user_id'
        ]);/*
        $this->belongsToMany('Approvals', [
            'through' => 'Approvals',
            'foreignKey' => 'role_id',
        ]);*/
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
//        Define data to mapping entity
//        if (isset($data['dep_name'])) {
//            $data['name'] = $data['dep_name'];
//        }
//        if (isset($data['dep_tel'])) {
//            $data['tel'] = $data['dep_tel'];
//        }
//        if (isset($data['dep_address'])) {
//            $data['address'] = $data['dep_address'];
//        }
    }
}

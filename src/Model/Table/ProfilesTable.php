<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

class ProfilesTable extends Table
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

        $this->table('tbl_master_profile');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
//        $this->belongsTo('Users');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('first_name', 'The Name field is required')
            ->notEmpty('last_name', 'The address field is required');
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
//        Define data to mapping entity
        if (isset($data['phone_num'])) {
            $data['contact_number'] = $data['phone_num'];
        }
        if (isset($data['dep_tel'])) {
            $data['tel'] = $data['dep_tel'];
        }
        if (isset($data['dep_address'])) {
            $data['address'] = $data['dep_address'];
        }
    }
}

<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TblMasterUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Logins
 *
 * @method \App\Model\Entity\UsersTable get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersTable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersTable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersTable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersTable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersTable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersTable findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    public  $hasMany = array( 'Requests' => array( 'className' => 'Requests' ) );
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tbl_master_users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Roles');
        $this->belongsToMany('role', [
            'through' => 'RoleUsers',
            'className' => 'Roles',
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'role_id'
        ]);

        $this->belongsToMany('Approvals', [
            'through' => 'Approvals',
            'className' => 'Requests',
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'req_id'
        ]);


        $this->belongsTo('dep', [
            'className' => 'Departments',
            'foreignKey' => 'dep_id',
        ]);
//        $this->hasOne('Profiles', [
//            'className' => 'Profiles',
//            'foreignKey' => 'user_id'
//        ]);
        $this->hasOne('Profiles', [
            'className' => 'Profiles',
            'dependent' => true
        ]);

        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidate_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Positions', [
            'foreignKey' => 'dept'
        ]);
    }
    public function findExistsOr(Query $query, array $conditions)
    {

        return (bool)count(
            $query->select(['existing' => 1])
                ->orWhere($conditions)
                ->limit(1)
                ->hydrate(false)
                ->toArray()
        );

    }
    public function findGroupUsers(Query $query, array $conditions)
    {
        $query = $query->select([
                'Users.id',
                'Users.username',
                'first_name' => 'Profiles.first_name',
                'last_name' =>'Profiles.last_name',
                'role' =>'Roles.name',

            ])->leftJoinWith('Profiles')->join([
                'table' => 'tbl_master_role_user',
                'alias' => 'RoleUser',
                'type' => 'LEFT',
                'conditions' => 'RoleUser.user_id = Users.id',
            ])
            ->join([
                'table' => 'tbl_master_roles',
                'alias' => 'Roles',
                'type' => 'LEFT',
                'conditions' => 'Roles.id = RoleUser.role_id',
            ])
            ;
        $query = $query->where($conditions)->toArray();
        return $query;
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
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required');
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email','username']));
        return $rules;
    }
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
//        Define data to mapping entity
        if (isset($data['dep_name'])) {
            $data['name'] = $data['dep_name'];
        }
        if (isset($data['dep_tel'])) {
            $data['tel'] = $data['dep_tel'];
        }
        if (isset($data['dep_address'])) {
            $data['address'] = $data['dep_address'];
        }
    }

}

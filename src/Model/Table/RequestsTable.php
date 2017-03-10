<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

/**
 * TblMasterDepartments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Logins
 *
 * @method \App\Model\Entity\RequestsTable get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequestsTable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequestsTable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequestsTable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequestsTable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequestsTable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequestsTable findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequestsTable extends Table
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

        $this->table('tbl_master_requests');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'className' => 'Users'
        ]);
        $this->belongsTo('Departments', [
            'className' => 'Departments',
            'foreignKey' => 'dep_id'
        ]);
        $this->belongsTo('Categories', [
            'className' => 'Categories',
            'foreignKey' => 'cate_id'
        ]);

        $this->belongsToMany('Approvals', [
            'through' => 'Approvals',
            'foreignKey' => 'req_id'
        ]);
        $this->belongsTo('Profiles', [
            'className' => 'Profiles',
            'foreignKey' => 'user_id'
        ]);
//        $this->belongsTo('Users',[
//                'className'=>['Users'],
//                'propertyName'=>['alias_name']
//            ]
//        );

    }
    public function findOrWhere(Query $query, array $conditions){
        if(isset($conditions['OR']))
        {
             $query= $query->orWhere($conditions['OR']);
        }
        return $query->hydrate(true);
    }

    public function findRequestList(Query $query)
    {
        $top_status = $query->newExpr()
            ->addCase([
                $query->newExpr()->add(['Roles.name' => 'top','Approvals.status'=>'approved']),
                $query->newExpr()->add(['Roles.name' => 'top','Approvals.status'=>'rejected']),
                $query->newExpr()->add(['Roles.name' => 'top','Approvals.status'=>'returned']),
            ],
                [1,2,3,0],
                ['integer', 'integer', 'integer', 'integer']
            );
        $manager_status = $query->newExpr()
            ->addCase([
                $query->newExpr()->add(['Roles.name' => 'manager','Approvals.status'=>'approved']),
                $query->newExpr()->add(['Roles.name' => 'manager','Approvals.status'=>'rejected']),
                $query->newExpr()->add(['Roles.name' => 'manager','Approvals.status'=>'returned']),
            ],
                [1,2,3,0],
                ['integer', 'integer', 'integer', 'integer']
            );
        $sub_manager_status = $query->newExpr()
            ->addCase(
                [
                    $query->newExpr()->add(['Roles.name' => 'sub-manager','Approvals.status'=>'approved']),
                    $query->newExpr()->add(['Roles.name' => 'sub-manager','Approvals.status'=>'rejected']),
                    $query->newExpr()->add(['Roles.name' => 'sub-manager','Approvals.status'=>'returned']),
                ],
                [1,2,3,0],
                ['integer', 'integer', 'integer', 'integer']
            );

        $query = $query->autoFields(true)->select([
            'department_id' => 'Departments.id',
            'department_name' => 'Departments.name',
            'role_name' => 'Roles1.name',
            'categories_name' => 'Categories.name',
            'alias_name' => $query->func()->concat(['Profiles.first_name' => 'identifier',' ','Profiles.last_name' => 'identifier']),
            'top_status' => $query->func()->max($top_status),
            'manager_status' => $query->func()->max($manager_status),
            'sub_manager_status' => $query->func()->max($sub_manager_status)
        ])->leftJoinWith('Departments')->leftJoinWith('Categories')->hydrate(false)
            ->join([
                'table' => 'tbl_master_approval',
                'alias' => 'Approvals',
                'type' => 'LEFT',
                'conditions' => 'Requests.id = Approvals.req_id',
            ])
            ->join([
                'table' => 'tbl_master_profile',
                'alias' => 'Profiles',
                'type' => 'LEFT',
                'conditions' => 'Profiles.user_id = Requests.user_id',
            ])
            ->join([
                'table' => 'tbl_master_roles',
                'alias' => 'Roles',
                'type' => 'LEFT',
                'conditions' => 'Roles.id = Approvals.role_id',
            ])
            ->join([
                'table' => 'tbl_master_role_user',
                'alias' => 'RoleUser',
                'type' => 'LEFT',
                'conditions' => 'RoleUser.user_id = Requests.user_id',
            ])
            ->join([
                'table' => 'tbl_master_roles',
                'alias' => 'Roles1',
                'type' => 'LEFT',
                'conditions' => 'Roles1.id = RoleUser.role_id',
            ]);
        return $query->hydrate(true);

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
            ->notEmpty('dep_name', 'The Name field is required')
            ->notEmpty('dep_address', 'The address field is required');
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if (isset($data['sltCategory'])) {
            $data['cate_id'] = $data['sltCategory'];
        }
        if (isset($data['txtPrice'])) {
            $data['price'] = $data['txtPrice'];
        }
        if (isset($data['txtApproveDate'])) {
            $data['appr_date'] = $data['txtApproveDate'];
        }
        if (isset($data['txtPaymentDate'])) {
            $data['payment_date'] = $data['txtPaymentDate'];
        }
        if (isset($data['txtTitle'])) {
            $data['title'] = $data['txtTitle'];
        }
        if (isset($data['txtDescription'])) {
            $data['description'] = $data['txtDescription'];
        }
        if (isset($data['txtReason'])) {
            $data['reason'] = $data['txtReason'];
        }
        if (isset($data['txtNote'])) {
            $data['note'] = $data['txtNote'];
        }
    }
}

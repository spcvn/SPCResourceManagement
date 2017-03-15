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
 * @method \App\Model\Entity\DepartmentsTable get($primaryKey, $options = [])
 * @method \App\Model\Entity\DepartmentsTable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DepartmentsTable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsTable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentsTable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsTable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsTable findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApprovalsTable extends Table
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

        $this->table('tbl_master_approval');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Requests', [
            'className' => 'Requests',
            'foreignKey' => 'req_id'
        ]);

        $this->belongsTo('Roles');
        $this->belongsTo('Users');
        $this->belongsTo('Profiles', [
            'className' => 'Profiles',
            'foreignKey' => 'user_id'
        ]);
    }

//SELECT pr.* FROM tbl_master_approval as ap
//LEFT JOIN tbl_master_requests as rs on rs.id = ap.req_id
//LEFT JOIN tbl_master_roles as ro on ro.id = ap.role_id
//LEFT JOIN tbl_master_users as us on us.id = ap.user_id
//LEFT JOIN tbl_master_profile as pr on us.id = pr.user_id
//WHERE rs.id =1 AND (ro.name = 'manager' or ro.name = 'top')


    public function findRequestDetail(Query $query)
    {
        $query = $query->autoFields(true)->select([
            'department_id' => 'Departments.id',
            'department_name' => 'Departments.name',
            'role_name' => 'Roles1.name',
            'categories_name' => 'Categories.name',
        ])->leftJoinWith('Requests')->leftJoinWith('Users')->leftJoinWith('Categories')
//            ->join([
//                'table' => 'tbl_master_requests',
//                'alias' => 'Requests',
//                'type' => 'LEFT',
//                'conditions' => 'Requests.id = Approvals.req_id',
//            ])
            ->join([
                'table' => 'tbl_master_profile',
                'alias' => 'Profile',
                'type' => 'LEFT',
                'conditions' => 'Profile.user_id = Approvals.role_id',
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
//            ->where($conditions)
//            ->group('Requests.id');
        return $query->hydrate(true);

    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {

    }
}

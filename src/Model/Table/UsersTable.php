<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Candidates
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidate_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->allowEmpty('middle_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->requirePresence('addr01', 'create')
            ->notEmpty('addr01');
        $validator
            ->integer('provinceid')
            ->requirePresence('provinceid', 'create')
            ->notEmpty('provinceid');

        $validator
            ->integer('districtid')
            ->requirePresence('districtid', 'create')
            ->notEmpty('districtid');

        $validator
            ->integer('wardid')
            ->requirePresence('wardid', 'create')
            ->notEmpty('wardid');

        $validator
            ->date('birth_date')
            ->requirePresence('birth_date', 'create')
            ->notEmpty('birth_date');

        $validator
            ->requirePresence('mobile', 'create')
            ->notEmpty('mobile');

        $validator
            ->requirePresence('dept', 'create')
            ->notEmpty('dept');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');
         $validator
            ->requirePresence('email')
            ->add('email', 'validFormat', [
                'rule' => 'email',
                'message' => 'E-mail must be valid'
            ]);

        $validator->add('password', [
            'compare' => [
                'rule' => ['compareWith', 'confirm_password'],
                'message' => 'confirm password is not correct',
            ]
        ]);
        $validator->add('password', 'length', 
            ['rule' => ['lengthBetween', 6, 12],
            'message' => 'Your password must be between 6 to 12 characters'
            ]);
        $validator->add('birth_date','age',['rule'=>function($check){
            $age = date('Y') - $check['year'];
            if($age >13){
                return true;
            }
            return false;
        },'message' => 'You must be over 13 years old']);
        $validator->add('mobile',['phone_no_should_be_numeric'=>array(
            'rule' => 'numeric',
            'allowEmpty' => true, 
            'message'=>'Phone number should be numeric')
        ]);

        return $validator;
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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['candidate_id'], 'Candidates'));

        return $rules;
    }
}

<?php
namespace AceTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Candidates
 *
 * @method \AceTheme\Model\Entity\User get($primaryKey, $options = [])
 * @method \AceTheme\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \AceTheme\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \AceTheme\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AceTheme\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AceTheme\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \AceTheme\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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
            'joinType' => 'INNER',
            'className' => 'AceTheme.Candidates'
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
            ->requirePresence('salt', 'create')
            ->notEmpty('salt');

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
            ->requirePresence('addr02', 'create')
            ->notEmpty('addr02');

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
            ->requirePresence('avatar', 'create')
            ->notEmpty('avatar');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('role')
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        $validator
            ->date('start_work')
            ->requirePresence('start_work', 'create')
            ->notEmpty('start_work');

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

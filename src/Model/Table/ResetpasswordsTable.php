<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resetpasswords Model
 *
 * @method \App\Model\Entity\Resetpassword get($primaryKey, $options = [])
 * @method \App\Model\Entity\Resetpassword newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Resetpassword[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resetpassword|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resetpassword patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Resetpassword[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resetpassword findOrCreate($search, callable $callback = null)
 */
class ResetpasswordsTable extends Table
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

        $this->table('resetpasswords');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->requirePresence('token', 'create')
            ->notEmpty('token');

        $validator
            ->dateTime('create')
            ->requirePresence('create', 'create')
            ->notEmpty('create');

        $validator
            ->integer('timeout')
            ->requirePresence('timeout', 'create')
            ->notEmpty('timeout');

        $validator
            ->integer('userid')
            ->requirePresence('userid', 'create')
            ->notEmpty('userid');

        return $validator;
    }
}

<?php
namespace City\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ward Model
 *
 * @method \City\Model\Entity\Ward get($primaryKey, $options = [])
 * @method \City\Model\Entity\Ward newEntity($data = null, array $options = [])
 * @method \City\Model\Entity\Ward[] newEntities(array $data, array $options = [])
 * @method \City\Model\Entity\Ward|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \City\Model\Entity\Ward patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \City\Model\Entity\Ward[] patchEntities($entities, array $data, array $options = [])
 * @method \City\Model\Entity\Ward findOrCreate($search, callable $callback = null)
 */
class WardTable extends Table
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

        $this->table('ward');
        $this->displayField('name');
        $this->primaryKey('wardid');
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
            ->allowEmpty('wardid', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        $validator
            ->requirePresence('districtid', 'create')
            ->notEmpty('districtid');

        return $validator;
    }
}

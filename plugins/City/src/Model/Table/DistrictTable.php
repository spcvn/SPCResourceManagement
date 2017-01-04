<?php
namespace City\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * District Model
 *
 * @method \City\Model\Entity\District get($primaryKey, $options = [])
 * @method \City\Model\Entity\District newEntity($data = null, array $options = [])
 * @method \City\Model\Entity\District[] newEntities(array $data, array $options = [])
 * @method \City\Model\Entity\District|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \City\Model\Entity\District patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \City\Model\Entity\District[] patchEntities($entities, array $data, array $options = [])
 * @method \City\Model\Entity\District findOrCreate($search, callable $callback = null)
 */
class DistrictTable extends Table
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

        $this->table('district');
        $this->displayField('name');
        $this->primaryKey('districtid');
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
            ->allowEmpty('districtid', 'create');

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
            ->requirePresence('provinceid', 'create')
            ->notEmpty('provinceid');

        return $validator;
    }
}

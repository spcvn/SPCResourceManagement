<?php
namespace Province\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Districts Model
 *
 * @method \Province\Model\Entity\District get($primaryKey, $options = [])
 * @method \Province\Model\Entity\District newEntity($data = null, array $options = [])
 * @method \Province\Model\Entity\District[] newEntities(array $data, array $options = [])
 * @method \Province\Model\Entity\District|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Province\Model\Entity\District patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Province\Model\Entity\District[] patchEntities($entities, array $data, array $options = [])
 * @method \Province\Model\Entity\District findOrCreate($search, callable $callback = null)
 */
class DistrictsTable extends Table
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

        $this->table('districts');
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

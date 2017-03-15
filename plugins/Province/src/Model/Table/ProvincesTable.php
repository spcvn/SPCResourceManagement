<?php
namespace Province\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Provinces Model
 *
 * @method \Province\Model\Entity\Province get($primaryKey, $options = [])
 * @method \Province\Model\Entity\Province newEntity($data = null, array $options = [])
 * @method \Province\Model\Entity\Province[] newEntities(array $data, array $options = [])
 * @method \Province\Model\Entity\Province|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Province\Model\Entity\Province patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Province\Model\Entity\Province[] patchEntities($entities, array $data, array $options = [])
 * @method \Province\Model\Entity\Province findOrCreate($search, callable $callback = null)
 */
class ProvincesTable extends Table
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

        $this->table('provinces');
        $this->displayField('name');
        $this->primaryKey('provinceid');
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
            ->allowEmpty('provinceid', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        return $validator;
    }
}

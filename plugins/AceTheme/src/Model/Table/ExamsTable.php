<?php
namespace AceTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exams Model
 *
 * @method \AceTheme\Model\Entity\Exam get($primaryKey, $options = [])
 * @method \AceTheme\Model\Entity\Exam newEntity($data = null, array $options = [])
 * @method \AceTheme\Model\Entity\Exam[] newEntities(array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Exam|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AceTheme\Model\Entity\Exam patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Exam[] patchEntities($entities, array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Exam findOrCreate($search, callable $callback = null, $options = [])
 */
class ExamsTable extends Table
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

        $this->table('exams');
        $this->displayField('name');
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('num_questions')
            ->requirePresence('num_questions', 'create')
            ->notEmpty('num_questions');

        $validator
            ->requirePresence('section', 'create')
            ->notEmpty('section');

        $validator
            ->dateTime('create_date')
            ->requirePresence('create_date', 'create')
            ->notEmpty('create_date');

        $validator
            ->dateTime('update_date')
            ->requirePresence('update_date', 'create')
            ->notEmpty('update_date');

        $validator
            ->integer('is_delete')
            ->requirePresence('is_delete', 'create')
            ->notEmpty('is_delete');

        $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->notEmpty('id_user');

        return $validator;
    }
}

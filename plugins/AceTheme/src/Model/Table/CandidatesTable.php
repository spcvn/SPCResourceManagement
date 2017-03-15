<?php
namespace AceTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Candidates Model
 *
 * @property \Cake\ORM\Association\HasMany $Quizs
 * @property \Cake\ORM\Association\HasMany $Users
 *
 * @method \AceTheme\Model\Entity\Candidate get($primaryKey, $options = [])
 * @method \AceTheme\Model\Entity\Candidate newEntity($data = null, array $options = [])
 * @method \AceTheme\Model\Entity\Candidate[] newEntities(array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Candidate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AceTheme\Model\Entity\Candidate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Candidate[] patchEntities($entities, array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Candidate findOrCreate($search, callable $callback = null, $options = [])
 */
class CandidatesTable extends Table
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

        $this->table('candidates');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Quizs', [
            'foreignKey' => 'candidate_id',
            'className' => 'AceTheme.Quizs'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'candidate_id',
            'className' => 'AceTheme.Users'
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->allowEmpty('middle_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->date('birth_date')
            ->requirePresence('birth_date', 'create')
            ->notEmpty('birth_date');

        $validator
            ->integer('married')
            ->requirePresence('married', 'create')
            ->notEmpty('married');

        $validator
            ->requirePresence('addr01', 'create')
            ->notEmpty('addr01');

        $validator
            ->requirePresence('mobile', 'create')
            ->notEmpty('mobile');

        $validator
            ->requirePresence('expected_salary', 'create')
            ->notEmpty('expected_salary');

        $validator
            ->dateTime('interview_date')
            ->requirePresence('interview_date', 'create')
            ->notEmpty('interview_date');

        $validator
            ->requirePresence('position', 'create')
            ->notEmpty('position');

        $validator
            ->integer('score')
            ->allowEmpty('score');

        $validator
            ->requirePresence('result', 'create')
            ->notEmpty('result');

        $validator
            ->date('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');

        $validator
            ->date('update_date')
            ->requirePresence('update_date', 'create')
            ->notEmpty('update_date');

        return $validator;
    }
}

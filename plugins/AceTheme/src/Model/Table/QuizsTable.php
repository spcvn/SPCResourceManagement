<?php
namespace AceTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quizs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Candidates
 * @property \Cake\ORM\Association\HasMany $QuizDetails
 *
 * @method \AceTheme\Model\Entity\Quiz get($primaryKey, $options = [])
 * @method \AceTheme\Model\Entity\Quiz newEntity($data = null, array $options = [])
 * @method \AceTheme\Model\Entity\Quiz[] newEntities(array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Quiz|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AceTheme\Model\Entity\Quiz patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Quiz[] patchEntities($entities, array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Quiz findOrCreate($search, callable $callback = null, $options = [])
 */
class QuizsTable extends Table
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

        $this->table('quizs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidate_id',
            'joinType' => 'INNER',
            'className' => 'AceTheme.Candidates'
        ]);
        $this->hasMany('QuizDetails', [
            'foreignKey' => 'quiz_id',
            'className' => 'AceTheme.QuizDetails'
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->integer('time')
            ->requirePresence('time', 'create')
            ->notEmpty('time');

        $validator
            ->dateTime('quiz_date')
            ->requirePresence('quiz_date', 'create')
            ->notEmpty('quiz_date');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('score')
            ->requirePresence('score', 'create')
            ->notEmpty('score');

        $validator
            ->integer('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');

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
        $rules->add($rules->existsIn(['candidate_id'], 'Candidates'));

        return $rules;
    }
}

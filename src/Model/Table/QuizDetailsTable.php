<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuizDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Quizzes
 * @property \Cake\ORM\Association\BelongsTo $Questions
 * @property \Cake\ORM\Association\BelongsTo $Answers
 *
 * @method \App\Model\Entity\QuizDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuizDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QuizDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuizDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuizDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuizDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuizDetail findOrCreate($search, callable $callback = null)
 */
class QuizDetailsTable extends Table
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

        $this->table('quiz_details');
        $this->displayField('quiz_id');
        $this->primaryKey(['quiz_id', 'question_id']);

        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Answers', [
            'foreignKey' => 'answer_id',
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
            ->integer('is_correct')
            ->requirePresence('is_correct', 'create')
            ->notEmpty('is_correct');

        $validator
            ->integer('sort')
            ->requirePresence('sort', 'create')
            ->notEmpty('sort');

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
        $rules->add($rules->existsIn(['question_id'], 'Questions'));
        $rules->add($rules->existsIn(['answer_id'], 'Answers'));

        return $rules;
    }
}

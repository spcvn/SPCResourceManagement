<?php
namespace AceTheme\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questions Model
 *
 * @property \Cake\ORM\Association\HasMany $Answers
 * @property \Cake\ORM\Association\HasMany $QuizDetails
 *
 * @method \AceTheme\Model\Entity\Question get($primaryKey, $options = [])
 * @method \AceTheme\Model\Entity\Question newEntity($data = null, array $options = [])
 * @method \AceTheme\Model\Entity\Question[] newEntities(array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Question|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AceTheme\Model\Entity\Question patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Question[] patchEntities($entities, array $data, array $options = [])
 * @method \AceTheme\Model\Entity\Question findOrCreate($search, callable $callback = null, $options = [])
 */
class QuestionsTable extends Table
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

        $this->table('questions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Answers', [
            'foreignKey' => 'question_id',
            'className' => 'AceTheme.Answers'
        ]);
        $this->hasMany('QuizDetails', [
            'foreignKey' => 'question_id',
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
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->integer('section')
            ->requirePresence('section', 'create')
            ->notEmpty('section');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}

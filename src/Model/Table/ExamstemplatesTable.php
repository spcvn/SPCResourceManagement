<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Examstemplates Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Sections
 *
 * @method \App\Model\Entity\Examstemplate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Examstemplate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Examstemplate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Examstemplate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examstemplate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Examstemplate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Examstemplate findOrCreate($search, callable $callback = null)
 */
class ExamstemplatesTable extends Table
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

        $this->table('examstemplates');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsToMany('Sections', [
            'foreignKey' => 'examstemplate_id',
            'targetForeignKey' => 'section_id',
            'joinTable' => 'examstemplates_sections'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('num_questions')
            ->requirePresence('num_questions', 'create')
            ->notEmpty('num_questions');

        /*$validator
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
            ->notEmpty('is_delete');*/

        $validator
            ->integer('id_user')
            ->allowEmpty('id_user');

        $validator
            ->integer('duration')
            ->requirePresence('duration', 'create')
            ->notEmpty('duration');

        return $validator;
    }
}

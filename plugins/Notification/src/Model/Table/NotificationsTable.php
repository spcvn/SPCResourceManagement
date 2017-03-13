<?php
/**
 *
 * Copyright (c) Son Nguyen
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Son Nguyen
 * @link          Project
 * @since         1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


namespace Notification\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class NotificationsTable  extends Table
{
    /**.
     * Configurations
     * @var array
     */
    public $config = [];
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('tbl_master_notifications');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->allowEmpty('title')
            ->allowEmpty('body')
            ->add('state', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('state');
        return $validator;
    }
}

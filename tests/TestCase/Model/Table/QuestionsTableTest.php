<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionsTable Test Case
 */
class QuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionsTable
     */
    public $Questions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.questions',
        'app.answers',
        'app.quiz_details',
        'app.sections'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Questions') ? [] : ['className' => 'App\Model\Table\QuestionsTable'];
        $this->Questions = TableRegistry::get('Questions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Questions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

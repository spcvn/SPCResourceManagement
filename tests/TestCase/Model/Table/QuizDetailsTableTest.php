<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuizDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuizDetailsTable Test Case
 */
class QuizDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuizDetailsTable
     */
    public $QuizDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.quiz_details',
        'app.quizzes',
        'app.questions',
        'app.answers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('QuizDetails') ? [] : ['className' => 'App\Model\Table\QuizDetailsTable'];
        $this->QuizDetails = TableRegistry::get('QuizDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QuizDetails);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

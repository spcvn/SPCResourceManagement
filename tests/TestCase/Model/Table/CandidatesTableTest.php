<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidatesTable Test Case
 */
class CandidatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidatesTable
     */
    public $Candidates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.candidates',
        'app.quizs',
        'app.quiz_details',
        'app.questions',
        'app.answers',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Candidates') ? [] : ['className' => 'App\Model\Table\CandidatesTable'];
        $this->Candidates = TableRegistry::get('Candidates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Candidates);

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

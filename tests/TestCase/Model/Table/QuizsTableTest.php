<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuizsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuizsTable Test Case
 */
class QuizsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuizsTable
     */
    public $Quizs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.quizs',
        'app.candidates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Quizs') ? [] : ['className' => 'App\Model\Table\QuizsTable'];
        $this->Quizs = TableRegistry::get('Quizs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Quizs);

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

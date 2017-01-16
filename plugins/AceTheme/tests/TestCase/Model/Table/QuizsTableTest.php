<?php
namespace AceTheme\Test\TestCase\Model\Table;

use AceTheme\Model\Table\QuizsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * AceTheme\Model\Table\QuizsTable Test Case
 */
class QuizsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \AceTheme\Model\Table\QuizsTable
     */
    public $Quizs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ace_theme.quizs',
        'plugin.ace_theme.candidates',
        'plugin.ace_theme.users',
        'plugin.ace_theme.quiz_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Quizs') ? [] : ['className' => 'AceTheme\Model\Table\QuizsTable'];
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

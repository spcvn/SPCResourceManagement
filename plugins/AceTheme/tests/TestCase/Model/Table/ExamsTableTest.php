<?php
namespace AceTheme\Test\TestCase\Model\Table;

use AceTheme\Model\Table\ExamsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * AceTheme\Model\Table\ExamsTable Test Case
 */
class ExamsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \AceTheme\Model\Table\ExamsTable
     */
    public $Exams;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ace_theme.exams'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Exams') ? [] : ['className' => 'AceTheme\Model\Table\ExamsTable'];
        $this->Exams = TableRegistry::get('Exams', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Exams);

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

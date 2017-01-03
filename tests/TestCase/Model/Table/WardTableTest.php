<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WardTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WardTable Test Case
 */
class WardTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WardTable
     */
    public $Ward;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ward'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ward') ? [] : ['className' => 'App\Model\Table\WardTable'];
        $this->Ward = TableRegistry::get('Ward', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ward);

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

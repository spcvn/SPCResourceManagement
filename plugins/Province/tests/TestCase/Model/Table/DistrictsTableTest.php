<?php
namespace Province\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Province\Model\Table\DistrictsTable;

/**
 * Province\Model\Table\DistrictsTable Test Case
 */
class DistrictsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Province\Model\Table\DistrictsTable
     */
    public $Districts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.province.districts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Districts') ? [] : ['className' => 'Province\Model\Table\DistrictsTable'];
        $this->Districts = TableRegistry::get('Districts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Districts);

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

<?php
namespace Province\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Province\Model\Table\WardsTable;

/**
 * Province\Model\Table\WardsTable Test Case
 */
class WardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Province\Model\Table\WardsTable
     */
    public $Wards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.province.wards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Wards') ? [] : ['className' => 'Province\Model\Table\WardsTable'];
        $this->Wards = TableRegistry::get('Wards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wards);

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

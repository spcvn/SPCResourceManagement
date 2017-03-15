<?php
namespace Province\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Province\Model\Table\ProvincesTable;

/**
 * Province\Model\Table\ProvincesTable Test Case
 */
class ProvincesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Province\Model\Table\ProvincesTable
     */
    public $Provinces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.province.provinces'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Provinces') ? [] : ['className' => 'Province\Model\Table\ProvincesTable'];
        $this->Provinces = TableRegistry::get('Provinces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Provinces);

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

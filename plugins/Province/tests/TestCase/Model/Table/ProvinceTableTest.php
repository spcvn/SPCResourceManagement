<?php
namespace Province\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Province\Model\Table\ProvinceTable;

/**
 * Province\Model\Table\ProvinceTable Test Case
 */
class ProvinceTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Province\Model\Table\ProvinceTable
     */
    public $Province;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.province.province'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Province') ? [] : ['className' => 'Province\Model\Table\ProvinceTable'];
        $this->Province = TableRegistry::get('Province', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Province);

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

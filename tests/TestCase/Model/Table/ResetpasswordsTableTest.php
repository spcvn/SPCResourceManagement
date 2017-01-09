<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResetpasswordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResetpasswordsTable Test Case
 */
class ResetpasswordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResetpasswordsTable
     */
    public $Resetpasswords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.resetpasswords'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Resetpasswords') ? [] : ['className' => 'App\Model\Table\ResetpasswordsTable'];
        $this->Resetpasswords = TableRegistry::get('Resetpasswords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Resetpasswords);

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

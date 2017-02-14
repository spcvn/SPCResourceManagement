<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamstemplatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamstemplatesTable Test Case
 */
class ExamstemplatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamstemplatesTable
     */
    public $Examstemplates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.examstemplates',
        'app.sections',
        'app.questions',
        'app.answers',
        'app.quiz_details',
        'app.examstemplates_sections'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Examstemplates') ? [] : ['className' => 'App\Model\Table\ExamstemplatesTable'];
        $this->Examstemplates = TableRegistry::get('Examstemplates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Examstemplates);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamstemplatesSectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamstemplatesSectionsTable Test Case
 */
class ExamstemplatesSectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamstemplatesSectionsTable
     */
    public $ExamstemplatesSections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.examstemplates_sections',
        'app.examtemplates',
        'app.sections',
        'app.questions',
        'app.answers',
        'app.quiz_details',
        'app.examstemplates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ExamstemplatesSections') ? [] : ['className' => 'App\Model\Table\ExamstemplatesSectionsTable'];
        $this->ExamstemplatesSections = TableRegistry::get('ExamstemplatesSections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExamstemplatesSections);

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

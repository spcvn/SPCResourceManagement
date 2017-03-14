<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RolesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RolesController Test Case
 */
class RolesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.roles',
        'app.user',
        'app.role',
        'app.role_users',
        'app.users',
        'app.approvals',
        'app.departments',
        'app.categories',
        'app.profiles',
        'app.dep',
        'app.candidates',
        'app.positions',
        'app.quizs',
        'app.examstemplates',
        'app.sections',
        'app.questions',
        'app.answers',
        'app.quiz_details',
        'app.examstemplates_sections'
    ];

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test write_php_ini method
     *
     * @return void
     */
    public function testWritePhpIni()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test safefilerewrite method
     *
     * @return void
     */
    public function testSafefilerewrite()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\CityHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\CityHelper Test Case
 */
class CityHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\CityHelper
     */
    public $City;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->City = new CityHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->City);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

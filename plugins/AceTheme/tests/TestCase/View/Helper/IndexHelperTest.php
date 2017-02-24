<?php
namespace AceTheme\Test\TestCase\View\Helper;

use AceTheme\View\Helper\IndexHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * AceTheme\View\Helper\IndexHelper Test Case
 */
class IndexHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \AceTheme\View\Helper\IndexHelper
     */
    public $IndexHelper;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->IndexHelper = new IndexHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IndexHelper);

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

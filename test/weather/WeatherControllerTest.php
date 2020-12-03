<?php

namespace Anax\Weather;

use PHPUnit\Framework\TestCase;
use Anax\DI\DIFactoryConfig;
use Anax\Response\ResponseUtility;

/**
 * Example test class.
 */
class WeatherControllerTest extends TestCase
{
    private $controller;
    private $di;
     /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $this->di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        // Use a different cache dir for unit test
        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new WeatherController();
        $this->controller->setDI($this->di);
        //$this->controller->initialize();
    }

    //
    // /**
    //  * testing sum method
    //  */
    public function testInitAction()
    {
        $res = $this->controller->indexAction();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }

    public function testInvalidIp()
    {
        $request = $this->di->get("request");
        $request->setPost("ip", "test");

        $res = $this->controller->searchIpActionPost();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }

    
    public function testValidIp4()
    {
        $request = $this->di->get("request");

        $request->setPost("ip", "8.8.8.8");

        $res = $this->controller->searchIpActionPost();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }

    public function testValidIp6()
    {
        $request = $this->di->get("request");

        $request->setPost("ip", "2001:4860:4860::8888");

        $res = $this->controller->searchIpActionPost();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }

    public function testInvalidCoord()
    {
        $request = $this->di->get("request");
        $request->setPost("lat", "test");
        $request->setPost("long", "test");

        $res = $this->controller->searchCordActionPost();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }

    
    public function testValidCoord()
    {
        $request = $this->di->get("request");

        $request->setPost("lat", "20");
        $request->setPost("long", "30");

        $res = $this->controller->searchCordActionPost();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }
}

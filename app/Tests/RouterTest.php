<?php


namespace m2i\ecommerce\Test;


use m2i\Framework\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{

    public function testRouterReturnsTheController(){
        $router = new Router('/catalogue');
        $result = $router->getControllerName();
        $expect = "CatalogueController";
        $this->assertEquals($expect, $result);
    }

    public function testRouterReturnsTheAction(){
        $router = new Router('/catalogue/search');
        $result = $router->getActionName();
        $expect = "searchAction";
        $this->assertEquals($expect, $result);
    }

    public function testRouterReturnsTheParameters(){
        $router = new Router('/catalogue/search/5/2');
        $result = $router->getActionParameters();
        $expect = [5,2];
        $this->assertEquals($expect, $result);
    }

}

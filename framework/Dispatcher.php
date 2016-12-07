<?php
namespace m2i\Framework;

use m2i\ecommerce\Controllers;

class Dispatcher
{

    /**
     * @var IRouter
     */
    private $router;

    private $controllerNameSpace;

    /**
     * Dispatcher constructor.
     * @param IRouter $router
     */
    public function __construct(IRouter $router, $nameSpace)
    {
        $this->router = $router;
        $this->controllerNameSpace = $nameSpace;
    }

    public function dispatch(){
        $controllerName = $this->router->getControllerName();
        $controllerName = $this->controllerNameSpace.$controllerName;
        $actionName = $this->router->getActionName();

        $controller = new $controllerName();


        call_user_func_array(
            [
                $controller,
                $actionName
            ],
            $this->router->getActionParameters()
        );

    }


}
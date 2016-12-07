<?php
namespace m2i\Framework;

class Router implements IRouter
{

    private $url;

    private $controllerName = 'DefaultController';

    private $actionName = 'indexAction';

    private $actionParameters = [];

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url)
    {
        if(substr($url,0,1) == "/"){
            $url = substr($url,1);
        }
        $this->url = $url;
        $this->matchRoute();
    }


    private function matchRoute(){
        $urlParts = explode('/', $this->url);


        if(count($urlParts)>=1 && !empty($urlParts[0])){
            $this->controllerName = ucfirst(array_shift($urlParts))."Controller";
        }
        if(count($urlParts)>=1 && !empty($urlParts[0])){
            $this->actionName = Utils::camelize(array_shift($urlParts))."Action";
        }
        if(count($urlParts)>=1 && !empty($urlParts[0])){
            $this->actionParameters = $urlParts;
        }
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return Router
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @param mixed $controllerName
     * @return Router
     */
    public function setControllerName($controllerName)
    {
        $this->controllerName = $controllerName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @param mixed $actionName
     * @return Router
     */
    public function setActionName($actionName)
    {
        $this->actionName = $actionName;
        return $this;
    }

    /**
     * @return array
     */
    public function getActionParameters(): array
    {
        return $this->actionParameters;
    }

    /**
     * @param array $actionParameters
     * @return Router
     */
    public function setActionParameters(array $actionParameters): Router
    {
        $this->actionParameters = $actionParameters;
        return $this;
    }



}
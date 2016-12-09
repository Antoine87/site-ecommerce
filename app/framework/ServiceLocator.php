<?php
namespace m2i\Framework;


class ServiceLocator
{
    private static $container;

    public static  function register($serviceName,callable $callback){
        self::$container[$serviceName] = $callback;
    }

    public static function get($serviceName){
        $callback = self::$container[$serviceName];
        return $callback();
    }

}
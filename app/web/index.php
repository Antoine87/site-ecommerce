<?php
use m2i\Framework\Router;
use m2i\Framework\Dispatcher;

session_start();

define("ROOT_PATH", dirname(__DIR__));

include ROOT_PATH."/vendor/autoload.php";
include ROOT_PATH."/src/config/config.php";


//Récupération du paramètre page
$page = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRING);

//Gestion de la requête et routage de l'application
$router = new Router($page);
$dispatcher = new Dispatcher($router, "m2i\\ecommerce\\Controllers\\");
$dispatcher->dispatch();

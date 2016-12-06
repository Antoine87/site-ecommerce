<?php
define("ROOT_PATH", dirname(__DIR__));

include ROOT_PATH."/src/config/config.php";
include ROOT_PATH."/lib/lib-pdo.php";
include ROOT_PATH."/lib/framework/lib-mvc.php";
include ROOT_PATH."/lib/framework/lib-pdo.php";
include ROOT_PATH."/src/config/config.php";




//Récupération du paramètre page
$page = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRING);

require getControllerPath($page);

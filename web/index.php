<?php
define("ROOT_PATH", dirname(__DIR__));

include ROOT_PATH."/lib/framework/lib-mvc.php";

//Récupération du paramètre page
$page = filter_input(INPUT_GET,"page",FILTER_SANITIZE_STRING);

require getControllerPath($page);

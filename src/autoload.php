<?php

function autoloader($class){
    $path = ROOT_PATH."/src/Models/{$class}.php";

    if(file_exists($path)){
        include_once $path;
    } else {
        throw new Exception("Le fichier $class n'existe pas");
    }
}

spl_autoload_register('autoloader');
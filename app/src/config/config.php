<?php
use m2i\Framework\ServiceLocator;
use m2i\ecommerce\services\RecapPanier;
use m2i\ecommerce\DAO\LivreDAO;
use m2i\ecommerce\DTO\LivreDTO;

define('DSN','mysql:host=localhost;dbname=ecommerce;charset=utf8');
define('DB_USER', 'root');

if($_SERVER['SERVER_ADDR'] == '192.168.33.101'){
    define('DB_PASS', '12345678');
} else {
    define('DB_PASS', '');
}

ServiceLocator::register("recap_panier", function (){
    return new RecapPanier($_SESSION["panier"]??[]);
});

ServiceLocator::register("db_connection", function (){
    return new \PDO(DSN,DB_USER,DB_PASS, [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ]);
});

ServiceLocator::register("livres.dao", function (){
    return new LivreDAO(ServiceLocator::get("db_connection"));
});

ServiceLocator::register("livres.dto", function (){
    return new LivreDTO();
});
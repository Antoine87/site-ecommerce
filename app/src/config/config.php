<?php
define('DSN','mysql:host=localhost;dbname=ecommerce;charset=utf8');
define('DB_USER', 'root');

if($_SERVER['SERVER_ADDR'] == '192.168.33.101'){
    define('DB_PASS', '12345678');
} else {
    define('DB_PASS', '');
}


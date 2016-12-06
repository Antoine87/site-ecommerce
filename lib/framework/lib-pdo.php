<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 02/12/2016
 * Time: 15:13
 */



/**
 * Fonction de connexion à une base de données avec PDO
 * @return \PDO
 */
function getPDO(){
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    return new \PDO(DSN, DB_USER, DB_PASS, $options);
}
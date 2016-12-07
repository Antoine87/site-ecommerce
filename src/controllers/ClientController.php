<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 07/12/2016
 * Time: 10:15
 */

namespace m2i\ecommerce\Controllers;


use m2i\ecommerce\Config\DbConnection;
use m2i\ecommerce\DAO\ClientDAO;

class ClientController
{
    public function indexAction(){
        $dao = new ClientDAO(DbConnection::getPDO());
        $data = $dao->findAll();
        var_dump($data);
        echo "je suis le contrôleur du client";
    }
}
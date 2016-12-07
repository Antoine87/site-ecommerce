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
use m2i\ecommerce\DAO\LangueDAO;
use m2i\Framework\View;

class ClientController
{
    public function indexAction(){
        $dao = new LangueDAO(DbConnection::getPDO());
        $data = $dao->findAll();

        $view = new View();

        echo $view->render('view-home', [
            'data' => $data
            ]
        );
    }
}
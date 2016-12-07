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
use m2i\ecommerce\DAO\ClientDTO;
use m2i\Framework\View;

class ClientController
{

    private $pageTitle = "Clients";

    public function indexAction(){
        $dao = new ClientDAO(DbConnection::getPDO());
        $data = $dao->findAll();

        $view = new View();

        echo $view->render('view-client-list', [
            'data' => $data, 'pageTitle' => $this->pageTitle
            ]
        );
    }

    public function deleteAction($id){
        $dao = new ClientDAO(DbConnection::getPDO());
        $client = new ClientDTO();
        $client->setId($id);
        $dao->delete($client);

        header("location:/client");
    }

    public function formAction($id=null){

    }

    public function persistAction($id=null){

    }
}
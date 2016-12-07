<?php

namespace m2i\ecommerce\Controllers;


use m2i\ecommerce\Config\DbConnection;
use m2i\ecommerce\DAO\LivreDAO;
use m2i\Framework\View;

class CatalogueController
{
    public function indexAction(){
        $dao = new LivreDAO(DbConnection::getPDO());
        $catalogue = $dao->findAll();

        $view = new View();

        echo $view->render(
            'view-catalogue',
            [
                'pageTitle' => 'Catalogue',
                'catalogue' => $catalogue
            ]
        );
    }

}
<?php

namespace m2i\ecommerce\Controllers;


use m2i\ecommerce\Config\DbConnection;
use m2i\ecommerce\DAO\ILivreDAO;
use m2i\ecommerce\DAO\LivreDAO;
use m2i\Framework\ServiceLocator;
use m2i\Framework\View;

class CatalogueController
{
    public function indexAction(){
        $dao = $this->getDAO();
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

    public function ajoutPanierAction($id){
        $dao = $this->getDAO();
        $livre = $dao->findOneById([$id]);

        $panier = $_SESSION["panier"] ?? [];

        if(isset($panier[$id])){
            $panier[$id]["qt"] ++;
        } else {
            $panier[$id]["qt"] = 1;
            $panier[$id]["titre"] = $livre["titre"];
            $panier[$id]["prix"] = $livre["prix"];
        }

        $_SESSION["flash"] = "Votre produit a bien été ajouté au panier";

        $_SESSION["panier"] = $panier;

        header("location:/catalogue");
    }

    /**
     * @return ILivreDAO
     */
    private function getDAO(){
        return ServiceLocator::get("livres.dao");
    }

}
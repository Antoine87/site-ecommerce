<?php

namespace m2i\ecommerce\Controllers;


use duncan3dc\Phpexcel\Excel;
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

    public function exportAction(){
        try {
            $catalogue = $this->getDAO()->findAll();

            $excel = new Excel();

            $excel->setCell("A1", "Titre");
            $excel->setCell("B1", "Prix");
            $excel->setCell("C1", "Editeur");

            for($i=0; $i< count($catalogue); $i++){
                $livre = $catalogue[$i];
                $cell = $excel->getCellName(0, ($i+2));
                $excel->setCell($cell, $livre["titre"]);
                $cell = $excel->getCellName(1, ($i+2));
                $excel->setCell($cell, $livre["prix"]);
                $cell = $excel->getCellName(2, ($i+2));
                $excel->setCell($cell, $livre["nom_editeur"]);
            }

            header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.‌​sheet");
            header("Content-Disposition: attachment; filename=catalogue.xlsx");

            $path = 'php://output';
            $excel->save($path);

        } catch (\Exception $e){
            echo $e->getMessage();
        }

    }

    /**
     * @return ILivreDAO
     */
    private function getDAO(){
        return ServiceLocator::get("livres.dao");
    }

}
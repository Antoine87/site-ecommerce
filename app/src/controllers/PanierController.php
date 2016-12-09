<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 09/12/2016
 * Time: 09:33
 */

namespace m2i\ecommerce\Controllers;


use m2i\Framework\View;

class PanierController
{

    public function indexAction(){
        $panier = $_SESSION["panier"] ?? [];

        $view = new View();

        echo $view->render('view-panier',
            [
                'pageTitle' => 'Panier',
                'panier' => $panier
            ]
        );
    }

    public function recalculerAction(){
        $newQt = $_POST["qt"];
        $panier = $_SESSION["panier"] ?? [];

        foreach ($newQt as $pk => $val){
            if($val == 0){
                unset($panier[$pk]);
            } else {
                $panier[$pk]["qt"] = $val;
            }
        }

        $_SESSION["panier"] = $panier;

        header("location:/panier");
    }

    public function ViderAction(){
        unset($_SESSION["panier"]);
        header("location:/catalogue");
    }

}
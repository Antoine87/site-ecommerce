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

}
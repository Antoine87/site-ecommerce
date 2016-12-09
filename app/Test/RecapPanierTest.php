<?php


namespace  m2i\ecommerce\Test;


class RecapPanierTest extends PHPUnit_Framework_TestCase
{

    public  function  testTrueisTrue(){
        $this->assertEquals(true, true,"le booléen true est bien true");

    }

    public function TestRecapPanierKnowsHowToSum(){
        $panier = [
            "1" => [
                "qt" => 1,
                "prix" =>10
                ],

                2 => [
                    "qt" =>1,
                    "prix" =>10

                ],
            ];

        $recapPanier = new RecapPanier ($panier);
        $result = $recapPanier ->getInfos();
        $expect = "2 produits dans le panier pour 20 €";

        $this ->assertEquals($expect,$result);



    }
}

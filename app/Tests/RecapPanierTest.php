<?php


namespace m2i\ecommerce\Test;


use m2i\ecommerce\services\RecapPanier;

class RecapPanierTest extends \PHPUnit_Framework_TestCase
{
    private $panier;

    /**
     * @var RecapPanier
     */
    private $recapPanier;

    public function setUp()
    {
        $this->panier = [
            "1" => [
                "qt" => 1,
                "prix" => 10
            ],
            "2" => [
                "qt" => 1,
                "prix" => 10
            ],
        ];

        $this->recapPanier = new RecapPanier($this->panier);
    }

    public function testRecapPanierKnowsHowToSum(){
        $result = $this->recapPanier->getInfos();
        $expect = "2 produits dans le panier pour 20 €";

        $this->assertEquals($expect, $result);
    }

}

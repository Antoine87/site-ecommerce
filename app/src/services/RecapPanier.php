<?php
namespace m2i\ecommerce\services;

class RecapPanier
{

    private $panier = [];

    /**
     * RecapPanier constructor.
     * @param array $panier
     */
    public function __construct(array $panier)
    {
        $this->panier = $panier;
    }

    public function getInfos(){
        $total = 0;
        $totalQt = 0;
        $nbItem = count($this->panier);

        foreach ($this->panier as $item){
            $total += $item["prix"] * $item["qt"];
            $totalQt += $item["qt"];
        }

        return "$totalQt produits dans le panier pour $total €";
    }


}
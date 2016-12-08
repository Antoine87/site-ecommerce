<?php
namespace m2i\ecommerce\DTO;

class ModesLivraisonDTO {

    private $idModeLivraison;
private $descriptionModeLivraison;
private $tarifLivraison;
private $delaisLivraison;

    public function setIdModeLivraison($idModeLivraison){
            $this->idModeLivraison = $idModeLivraison;
        }
public function getIdModeLivraison(){
            return $this->idModeLivraison;
        }
public function setDescriptionModeLivraison($descriptionModeLivraison){
            $this->descriptionModeLivraison = $descriptionModeLivraison;
        }
public function getDescriptionModeLivraison(){
            return $this->descriptionModeLivraison;
        }
public function setTarifLivraison($tarifLivraison){
            $this->tarifLivraison = $tarifLivraison;
        }
public function getTarifLivraison(){
            return $this->tarifLivraison;
        }
public function setDelaisLivraison($delaisLivraison){
            $this->delaisLivraison = $delaisLivraison;
        }
public function getDelaisLivraison(){
            return $this->delaisLivraison;
        }

}
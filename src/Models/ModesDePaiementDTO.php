<?php
namespace m2i\ecommerce\DTO;

class ModesDePaiementDTO {

    private $idModeDePaiement;
private $modeDePaiement;

    public function setIdModeDePaiement($idModeDePaiement){
            $this->idModeDePaiement = $idModeDePaiement;
        }
public function getIdModeDePaiement(){
            return $this->idModeDePaiement;
        }
public function setModeDePaiement($modeDePaiement){
            $this->modeDePaiement = $modeDePaiement;
        }
public function getModeDePaiement(){
            return $this->modeDePaiement;
        }

}
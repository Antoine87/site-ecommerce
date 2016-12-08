<?php
namespace m2i\ecommerce\DTO;

class PaiementDTO {

    private $idCommande;
private $montant;
private $dateDePaiement;
private $idModeDePaiement;

    public function setIdCommande($idCommande){
            $this->idCommande = $idCommande;
        }
public function getIdCommande(){
            return $this->idCommande;
        }
public function setMontant($montant){
            $this->montant = $montant;
        }
public function getMontant(){
            return $this->montant;
        }
public function setDateDePaiement($dateDePaiement){
            $this->dateDePaiement = $dateDePaiement;
        }
public function getDateDePaiement(){
            return $this->dateDePaiement;
        }
public function setIdModeDePaiement($idModeDePaiement){
            $this->idModeDePaiement = $idModeDePaiement;
        }
public function getIdModeDePaiement(){
            return $this->idModeDePaiement;
        }

}
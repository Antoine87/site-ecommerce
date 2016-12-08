<?php
namespace m2i\ecommerce\DTO;

class LignesCommandeDTO {

    private $idCommande;
private $idLivre;
private $qte;

    public function setIdCommande($idCommande){
            $this->idCommande = $idCommande;
        }
public function getIdCommande(){
            return $this->idCommande;
        }
public function setIdLivre($idLivre){
            $this->idLivre = $idLivre;
        }
public function getIdLivre(){
            return $this->idLivre;
        }
public function setQte($qte){
            $this->qte = $qte;
        }
public function getQte(){
            return $this->qte;
        }

}
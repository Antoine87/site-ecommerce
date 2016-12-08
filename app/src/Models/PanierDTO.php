<?php
namespace m2i\ecommerce\DTO;

class PanierDTO {

    private $quantite;
private $idLivre;
private $idClient;

    public function setQuantite($quantite){
            $this->quantite = $quantite;
        }
public function getQuantite(){
            return $this->quantite;
        }
public function setIdLivre($idLivre){
            $this->idLivre = $idLivre;
        }
public function getIdLivre(){
            return $this->idLivre;
        }
public function setIdClient($idClient){
            $this->idClient = $idClient;
        }
public function getIdClient(){
            return $this->idClient;
        }

}
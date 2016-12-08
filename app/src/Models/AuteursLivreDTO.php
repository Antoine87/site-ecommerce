<?php
namespace m2i\ecommerce\DTO;

class AuteursLivreDTO {

    private $idLivre;
private $idAuteur;
private $idRole;

    public function setIdLivre($idLivre){
            $this->idLivre = $idLivre;
        }
public function getIdLivre(){
            return $this->idLivre;
        }
public function setIdAuteur($idAuteur){
            $this->idAuteur = $idAuteur;
        }
public function getIdAuteur(){
            return $this->idAuteur;
        }
public function setIdRole($idRole){
            $this->idRole = $idRole;
        }
public function getIdRole(){
            return $this->idRole;
        }

}
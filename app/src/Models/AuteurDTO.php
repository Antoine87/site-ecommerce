<?php
namespace m2i\ecommerce\DTO;

class AuteurDTO {

    private $idAuteur;
private $nomAuteur;
private $prenomAuteur;
private $biographie;

    public function setIdAuteur($idAuteur){
            $this->idAuteur = $idAuteur;
        }
public function getIdAuteur(){
            return $this->idAuteur;
        }
public function setNomAuteur($nomAuteur){
            $this->nomAuteur = $nomAuteur;
        }
public function getNomAuteur(){
            return $this->nomAuteur;
        }
public function setPrenomAuteur($prenomAuteur){
            $this->prenomAuteur = $prenomAuteur;
        }
public function getPrenomAuteur(){
            return $this->prenomAuteur;
        }
public function setBiographie($biographie){
            $this->biographie = $biographie;
        }
public function getBiographie(){
            return $this->biographie;
        }

}
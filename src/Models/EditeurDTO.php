<?php
class EditeurDTO {

    private $idEditeur;
private $nomEditeur;

    public function setIdEditeur($idEditeur){
            $this->idEditeur = $idEditeur;
        }
public function getIdEditeur(){
            return $this->idEditeur;
        }
public function setNomEditeur($nomEditeur){
            $this->nomEditeur = $nomEditeur;
        }
public function getNomEditeur(){
            return $this->nomEditeur;
        }

}
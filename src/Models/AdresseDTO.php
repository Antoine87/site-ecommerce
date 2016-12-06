<?php
class AdresseDTO {

    private $idAdresse;
private $adresse;
private $codePostal;
private $ville;
private $estAdresseFacturation;
private $idClient;

    public function setIdAdresse($idAdresse){
            $this->idAdresse = $idAdresse;
        }
public function getIdAdresse(){
            return $this->idAdresse;
        }
public function setAdresse($adresse){
            $this->adresse = $adresse;
        }
public function getAdresse(){
            return $this->adresse;
        }
public function setCodePostal($codePostal){
            $this->codePostal = $codePostal;
        }
public function getCodePostal(){
            return $this->codePostal;
        }
public function setVille($ville){
            $this->ville = $ville;
        }
public function getVille(){
            return $this->ville;
        }
public function setEstAdresseFacturation($estAdresseFacturation){
            $this->estAdresseFacturation = $estAdresseFacturation;
        }
public function getEstAdresseFacturation(){
            return $this->estAdresseFacturation;
        }
public function setIdClient($idClient){
            $this->idClient = $idClient;
        }
public function getIdClient(){
            return $this->idClient;
        }

}
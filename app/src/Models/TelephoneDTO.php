<?php
namespace m2i\ecommerce\DTO;

class TelephoneDTO {

    private $idTelephones;
private $numeroTelephone;
private $idClient;

    public function setIdTelephones($idTelephones){
            $this->idTelephones = $idTelephones;
        }
public function getIdTelephones(){
            return $this->idTelephones;
        }
public function setNumeroTelephone($numeroTelephone){
            $this->numeroTelephone = $numeroTelephone;
        }
public function getNumeroTelephone(){
            return $this->numeroTelephone;
        }
public function setIdClient($idClient){
            $this->idClient = $idClient;
        }
public function getIdClient(){
            return $this->idClient;
        }

}
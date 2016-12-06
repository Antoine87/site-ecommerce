<?php
class LangueDTO {

    private $idLangue;
private $nomLangue;

    public function setIdLangue($idLangue){
            $this->idLangue = $idLangue;
        }
public function getIdLangue(){
            return $this->idLangue;
        }
public function setNomLangue($nomLangue){
            $this->nomLangue = $nomLangue;
        }
public function getNomLangue(){
            return $this->nomLangue;
        }

}
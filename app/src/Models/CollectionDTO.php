<?php
namespace m2i\ecommerce\DTO;

class CollectionDTO {

    private $idCollection;
private $collection;
private $idEditeur;

    public function setIdCollection($idCollection){
            $this->idCollection = $idCollection;
        }
public function getIdCollection(){
            return $this->idCollection;
        }
public function setCollection($collection){
            $this->collection = $collection;
        }
public function getCollection(){
            return $this->collection;
        }
public function setIdEditeur($idEditeur){
            $this->idEditeur = $idEditeur;
        }
public function getIdEditeur(){
            return $this->idEditeur;
        }

}
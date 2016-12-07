<?php
namespace m2i\ecommerce\DAO;

class ClientDTO {

    private $idClient;
private $nom;
private $prenom;
private $email;
private $motDePasse;
private $dateNaissance;

    public function setId($idClient){
            $this->idClient = $idClient;
        }
public function getId(){
            return $this->idClient;
        }
public function setNom($nom){
            $this->nom = $nom;
        }
public function getNom(){
            return $this->nom;
        }
public function setPrenom($prenom){
            $this->prenom = $prenom;
        }
public function getPrenom(){
            return $this->prenom;
        }
public function setEmail($email){
            $this->email = $email;
        }
public function getEmail(){
            return $this->email;
        }
public function setMotDePasse($motDePasse){
            $this->motDePasse = $motDePasse;
        }
public function getMotDePasse(){
            return $this->motDePasse;
        }
public function setDateNaissance($dateNaissance){
            $this->dateNaissance = $dateNaissance;
        }
public function getDateNaissance(){
            return $this->dateNaissance;
        }

}
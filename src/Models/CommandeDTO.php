<?php
class CommandeDTO {

    private $numCommande;
private $dateCommande;
private $dateExpedition;
private $dateLivraison;
private $idClient;
private $idModeLivraison;
private $idCoupon;
private $idAdresse;
private $idStatut;

    public function setNumCommande($numCommande){
            $this->numCommande = $numCommande;
        }
public function getNumCommande(){
            return $this->numCommande;
        }
public function setDateCommande($dateCommande){
            $this->dateCommande = $dateCommande;
        }
public function getDateCommande(){
            return $this->dateCommande;
        }
public function setDateExpedition($dateExpedition){
            $this->dateExpedition = $dateExpedition;
        }
public function getDateExpedition(){
            return $this->dateExpedition;
        }
public function setDateLivraison($dateLivraison){
            $this->dateLivraison = $dateLivraison;
        }
public function getDateLivraison(){
            return $this->dateLivraison;
        }
public function setIdClient($idClient){
            $this->idClient = $idClient;
        }
public function getIdClient(){
            return $this->idClient;
        }
public function setIdModeLivraison($idModeLivraison){
            $this->idModeLivraison = $idModeLivraison;
        }
public function getIdModeLivraison(){
            return $this->idModeLivraison;
        }
public function setIdCoupon($idCoupon){
            $this->idCoupon = $idCoupon;
        }
public function getIdCoupon(){
            return $this->idCoupon;
        }
public function setIdAdresse($idAdresse){
            $this->idAdresse = $idAdresse;
        }
public function getIdAdresse(){
            return $this->idAdresse;
        }
public function setIdStatut($idStatut){
            $this->idStatut = $idStatut;
        }
public function getIdStatut(){
            return $this->idStatut;
        }

}
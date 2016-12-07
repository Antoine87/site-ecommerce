<?php
namespace m2i\ecommerce\DTO;

class LivreDTO {

    private $idLivre;
private $rubrique;
private $titre;
private $idLangue;
private $resume;
private $tableDesMatieres;
private $accroche;
private $dateParution;
private $idEditeur;
private $idCollection;
private $idFormat;
private $dimensionH;
private $dimensionL;
private $dimensionP;
private $poids;
private $nbPages;
private $ISBN_11;
private $ISBN_13;
private $couverture;
private $prix;
private $stock;
private $edition;

    public function setIdLivre($idLivre){
            $this->idLivre = $idLivre;
        }
public function getIdLivre(){
            return $this->idLivre;
        }
public function setRubrique($rubrique){
            $this->rubrique = $rubrique;
        }
public function getRubrique(){
            return $this->rubrique;
        }
public function setTitre($titre){
            $this->titre = $titre;
        }
public function getTitre(){
            return $this->titre;
        }
public function setIdLangue($idLangue){
            $this->idLangue = $idLangue;
        }
public function getIdLangue(){
            return $this->idLangue;
        }
public function setResume($resume){
            $this->resume = $resume;
        }
public function getResume(){
            return $this->resume;
        }
public function setTableDesMatieres($tableDesMatieres){
            $this->tableDesMatieres = $tableDesMatieres;
        }
public function getTableDesMatieres(){
            return $this->tableDesMatieres;
        }
public function setAccroche($accroche){
            $this->accroche = $accroche;
        }
public function getAccroche(){
            return $this->accroche;
        }
public function setDateParution($dateParution){
            $this->dateParution = $dateParution;
        }
public function getDateParution(){
            return $this->dateParution;
        }
public function setIdEditeur($idEditeur){
            $this->idEditeur = $idEditeur;
        }
public function getIdEditeur(){
            return $this->idEditeur;
        }
public function setIdCollection($idCollection){
            $this->idCollection = $idCollection;
        }
public function getIdCollection(){
            return $this->idCollection;
        }
public function setIdFormat($idFormat){
            $this->idFormat = $idFormat;
        }
public function getIdFormat(){
            return $this->idFormat;
        }
public function setDimensionH($dimensionH){
            $this->dimensionH = $dimensionH;
        }
public function getDimensionH(){
            return $this->dimensionH;
        }
public function setDimensionL($dimensionL){
            $this->dimensionL = $dimensionL;
        }
public function getDimensionL(){
            return $this->dimensionL;
        }
public function setDimensionP($dimensionP){
            $this->dimensionP = $dimensionP;
        }
public function getDimensionP(){
            return $this->dimensionP;
        }
public function setPoids($poids){
            $this->poids = $poids;
        }
public function getPoids(){
            return $this->poids;
        }
public function setNbPages($nbPages){
            $this->nbPages = $nbPages;
        }
public function getNbPages(){
            return $this->nbPages;
        }
public function setISBN_11($ISBN_11){
            $this->ISBN_11 = $ISBN_11;
        }
public function getISBN_11(){
            return $this->ISBN_11;
        }
public function setISBN_13($ISBN_13){
            $this->ISBN_13 = $ISBN_13;
        }
public function getISBN_13(){
            return $this->ISBN_13;
        }
public function setCouverture($couverture){
            $this->couverture = $couverture;
        }
public function getCouverture(){
            return $this->couverture;
        }
public function setPrix($prix){
            $this->prix = $prix;
        }
public function getPrix(){
            return $this->prix;
        }
public function setStock($stock){
            $this->stock = $stock;
        }
public function getStock(){
            return $this->stock;
        }
public function setEdition($edition){
            $this->edition = $edition;
        }
public function getEdition(){
            return $this->edition;
        }

}
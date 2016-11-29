/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

-- -----------------------------------------------------
-- Table ecommerce.Auteurs
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.Auteurs (
  id_auteur INT NOT NULL AUTO_INCREMENT,
  nom_auteur VARCHAR(45) NOT NULL,
  prenom_auteur VARCHAR(45) NOT NULL,
  biographie VARCHAR(250) NOT NULL,
  PRIMARY KEY (id_auteur))
ENGINE = InnoDB;
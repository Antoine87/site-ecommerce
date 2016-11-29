/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

-- Suppression de la base si elle existe
DROP DATABASE IF EXISTS ecommerce;

-- Création de la base de données
CREATE DATABASE ecommerce
CHARACTER SET = utf8 COLLATE = utf8_general_ci;

USE ecommerce;

-- ----------------------------------------------
-- Table langues
-- ----------------------------------------------
CREATE TABLE langues (
id_langue SMALLINT UNSIGNED AUTO_INCREMENT,
nom_langue VARCHAR(20) NOT NULL,
  PRIMARY KEY (id_langue)
) ENGINE = INNODB;

-- -----------------------------------------------------
-- Table `ecommerce`.`auteurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.auteurs (
  id_auteur INT NOT NULL AUTO_INCREMENT,
  nom_auteur VARCHAR(45) NOT NULL,
  prenom_auteur VARCHAR(45) NOT NULL,
  biographie VARCHAR(250) NOT NULL,
  PRIMARY KEY (id_auteur));

-- -----------------------------------------------------
-- Table `ecommerce`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`clients` (
  `id_client` INT NOT NULL,
  `nom` VARCHAR(45) NULL,
  `prenom` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  `mot_de_passe` VARCHAR(45) NULL,
  `date_naissance` DATE NULL,
  PRIMARY KEY (`id_client`))
ENGINE = InnoDB;


-- Export de données de la table e_commerce.éditeurs : ~3 rows (environ)
DELETE FROM `éditeurs`;
/*!40000 ALTER TABLE `éditeurs` DISABLE KEYS */;
INSERT INTO `éditeurs` (`Nom`) VALUES
	( 'MICHEL LAFON'),
	( 'John Tiffany'),
	( 'Carole Neel ');
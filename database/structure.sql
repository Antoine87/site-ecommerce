-- noinspection SqlNoDataSourceInspectionForFile
-- noinspection SqlDialectInspectionForFile
/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

DROP DATABASE IF EXISTS ecommerce;

-- Création de la base de données
CREATE DATABASE ecommerce
CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- utilisation de la bd
USE ecommerce;

-- ----------------------------------------------
-- Table langues
-- ----------------------------------------------
CREATE TABLE langues (
id_langue TINYINT UNSIGNED AUTO_INCREMENT,
nom_langue VARCHAR(30) NOT NULL,
  PRIMARY KEY (id_langue)
) ENGINE = INNODB;

-- -----------------------------------------------------
-- Table `ecommerce`.`auteurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.auteurs (
  id_auteur MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  nom_auteur VARCHAR(45) NOT NULL,
  prenom_auteur VARCHAR(45) NOT NULL,
  biographie TEXT NOT NULL,
  PRIMARY KEY (id_auteur)
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `ecommerce`.`clients`.
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`clients` (
  `id_client` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45),
  `email` VARCHAR(50) NOT NULL,
  `mot_de_passe` VARCHAR(128) NOT NULL,
  `date_naissance` DATE,
  PRIMARY KEY (`id_client`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`telephones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`telephones` (
  `id_telephones` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero_telephone` VARCHAR(10) NULL,
  `id_client` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_telephones`),
  INDEX `fk_telephones_clients1_idx` (`id_client` ASC),
  CONSTRAINT `fk_telephones_clients1`
    FOREIGN KEY (`id_client`)
    REFERENCES `ecommerce`.`clients` (`id_client`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`adresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`adresses` (
  `id_adresse` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `adresse` VARCHAR(45) NULL,
  `code_postal` VARCHAR(5) NULL,
  `ville` VARCHAR(45) NULL,
  `est_adresse_facturation` BIT NOT NULL DEFAULT 1,
  `id_client` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_adresse`),
  INDEX `fk_adresses_clients1_idx` (`id_client` ASC),
  CONSTRAINT `fk_adresses_clients1`
    FOREIGN KEY (`id_client`)
    REFERENCES `ecommerce`.`clients` (`id_client`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`statut_de_commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.statut_de_commmande (
    statut VARCHAR(255),
    id_statut Tinyint unsigned auto_increment,
    PRIMARY KEY (id_statut)
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`Coupon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Coupon` (
  `idCoupon` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Date_debut` DATE NULL,
  `Date_fin` DATE NULL,
  `Remise` FLOAT NULL,
  PRIMARY KEY (`idCoupon`))
ENGINE = InnoDB;


-- ------------------------------------------------------
--  TABLE ecommerce.mode_de_paiement
-- ------------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.mode_de_paiement (
  id_mode_de_paiement TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  mode_de_paiement VARCHAR(45) NOT NULL,
  PRIMARY KEY (id_mode_de_paiement),
  UNIQUE INDEX id_mode_de_paiement_UNIQUE (id_mode_de_paiement ASC)
) ENGINE = InnoDB;


-- ------------------------------------------------------
--  TABLE ecommerce.mode_livraison
-- ------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`mode_livraison` (
  `id_mode_livraison` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `description_mode_livraison` VARCHAR(45) NULL,
  `tarif_livraison` DECIMAL(5,2) NOT NULL DEFAULT 0.0,
  `delais_livraison` INT NULL,
  PRIMARY KEY (`id_mode_livraison`))
ENGINE = InnoDB;


-- ------------------------------------------------------
--  TABLE ecommerce.mode_editeur
-- ------------------------------------------------------
CREATE TABLE `ecommerce`.`editeurs` (
  id_editeur MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  nom_editeur VARCHAR(50) NOT NULL,
  PRIMARY KEY(id_editeur)
)ENGINE = Innodb;


-- ------------------------------------------------------
--  TABLE ecommerce.roles_auteurs
-- ------------------------------------------------------
CREATE TABLE `ecommerce`.`roles_auteurs` (
  id_role TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  role VARCHAR(20) NOT NULL,
  PRIMARY KEY(id_role)
)ENGINE = Innodb;


INSERT INTO ecommerce.mode_de_paiement (mode_de_paiement) VALUES ('espece');
INSERT INTO ecommerce.mode_de_paiement (mode_de_paiement) VALUES ('carte bleu');
INSERT INTO ecommerce.mode_de_paiement (mode_de_paiement) VALUES ('cheque');
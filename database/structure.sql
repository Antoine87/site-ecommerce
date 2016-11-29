/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

-- Suppression de la base si elle existe
DROP DATABASE IF EXISTS ecommerce;


-- Création de la base de données
CREATE DATABASE ecommerce
CHARACTER SET = utf8 COLLATE = utf8_general_ci;

USE ecommerce;

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


-- -----------------------------------------------------
-- Table `ecommerce`.`telephones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`telephones` (
  `id_telephones` INT NOT NULL,
  `numero_telephone` VARCHAR(15) NULL,
  `clients_id_client` INT NOT NULL,
  PRIMARY KEY (`id_telephones`),
  INDEX `fk_telephones_clients1_idx` (`clients_id_client` ASC),
  CONSTRAINT `fk_telephones_clients1`
    FOREIGN KEY (`clients_id_client`)
    REFERENCES `ecommerce`.`clients` (`id_client`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`adresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`adresses` (
  `id_adresse` INT NOT NULL,
  `adresse` VARCHAR(45) NULL,
  `code_postal` VARCHAR(5) NULL,
  `ville` VARCHAR(45) NULL,
  `adresse_facturation` INT NULL,
  `clients_id_client` INT NOT NULL,
  PRIMARY KEY (`id_adresse`),
  INDEX `fk_adresses_clients1_idx` (`clients_id_client` ASC),
  CONSTRAINT `fk_adresses_clients1`
    FOREIGN KEY (`clients_id_client`)
    REFERENCES `ecommerce`.`clients` (`id_client`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS statut_de_commmande (
    statut VARCHAR(255),
    id_satut Tinyint unsigned auto_increment
    PRIMARY KEY (id_statut)
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Coupon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Coupon` (
  `idCoupon` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Date_debut` DATE NULL,
  `Date_fin` DATE NULL,
  `Remise` FLOAT NULL,
  PRIMARY KEY (`idCoupon`))
ENGINE = InnoDB;
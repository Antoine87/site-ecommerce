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
-- Table `ecommerce`.`adresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`adresses` (
  `id_adresse` INT NOT NULL,
  `adresse` VARCHAR(45) NULL,
  `code_postal` VARCHAR(5) NULL,
  `ville` VARCHAR(45) NULL,
  `adresse_facturation` INT NULL,
  PRIMARY KEY (`id_adresse`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`telephones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`telephones` (
  `id_telephones` INT NOT NULL,
  `numero_telephone` VARCHAR(15) NULL,
  PRIMARY KEY (`id_telephones`))
ENGINE = InnoDB;


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
  `adresses_id_adresse` INT NOT NULL,
  `telephones_id_telephones` INT NOT NULL,
  PRIMARY KEY (`id_client`),
  INDEX `fk_clients_adresses_idx` (`adresses_id_adresse` ASC),
  INDEX `fk_clients_telephones1_idx` (`telephones_id_telephones` ASC),
  CONSTRAINT `fk_clients_adresses`
    FOREIGN KEY (`adresses_id_adresse`)
    REFERENCES `ecommerce`.`adresses` (`id_adresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clients_telephones1`
    FOREIGN KEY (`telephones_id_telephones`)
    REFERENCES `ecommerce`.`telephones` (`id_telephones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS statut_de_commmande (
    statut VARCHAR(255),
    id_satut Tinyint unsigned auto_increment
    PRIMARY KEY (id_statut)
)ENGINE = InnoDB;


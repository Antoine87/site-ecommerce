/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

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


-- -----------------------------------------------------
-- Table `ecommerce`.`Coupon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.statut_de_commmande (
  statut VARCHAR(255),
  id_satut Tinyint unsigned auto_increment
    PRIMARY KEY (id_statut)
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`Coupon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Coupon` (
  `idCoupon` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Date_debut` DATE NULL,
  `Date_fin` DATE NULL,
  `Remise` FLOAT NULL,
  PRIMARY KEY (`idCoupon`))
  ENGINE = InnoDB;


-- ------------------------------------------------------
--  TABLE ecommerce.mode_de_paiement
-- ------------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.mode_de_paiement (
  id_mode_de_paiement INT NOT NULL,
  mode_de_paiement VARCHAR(45) NOT NULL,
  PRIMARY KEY (id_mode_de_paiement),
  UNIQUE INDEX id_mode_de_paiement_UNIQUE (id_mode_de_paiement ASC))
  ENGINE = InnoDB;


-- ------------------------------------------------------
--  TABLE ecommerce.mode_livraison
-- ------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`mode_livraison` (
  `id_mode_livraison` INT NOT NULL,
  `description_mode_livraison` VARCHAR(45) NULL,
  `tarif_livraison` DECIMAL(2) NULL,
  `delais_livraison` INT NULL,
  PRIMARY KEY (`id_mode_livraison`))
  ENGINE = InnoDB;


-- ------------------------------------------------------
--  TABLE ecommerce.mode_editeurs
-- ------------------------------------------------------

-- Export de données de la table e_commerce.éditeurs : ~3 rows (environ)
DELETE FROM `éditeurs`;
ALTER TABLE `éditeurs` DISABLE KEYS ;
INSERT INTO `éditeurs` (`ID`, `Nom`) VALUES
  (1, 'MICHEL LAFON'),
  (2, 'John Tiffany'),
  (3, 'Carole Neel ');
ALTER TABLE `éditeurs` ENABLE KEYS ;
SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') ;
SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) ;
SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT ;


-- ------------------------------------------------------
--  TABLE ecommerce.roles_auteurs
-- ------------------------------------------------------
CREATE TABLE `ecommerce`.`roles_auteurs` (
  id_role INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(id_role)
);


INSERT INTO ecommerce.mode_de_paiement (mode_de_paiement) VALUES ('espece');
INSERT INTO ecommerce.mode_de_paiement (mode_de_paiement) VALUES ('carte bleu');
INSERT INTO ecommerce.mode_de_paiement (mode_de_paiement) VALUES ('cheque');

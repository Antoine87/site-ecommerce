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
CREATE TABLE IF NOT EXISTS ecommerce.statuts_de_commande (
    statut VARCHAR(20) NOT NULL UNIQUE ,
    id_statut Tinyint unsigned auto_increment,
    PRIMARY KEY (id_statut)
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`Coupon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Coupons` (
  `idCoupon` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Date_debut` DATE NULL,
  `Date_fin` DATE NULL,
  `Remise` FLOAT NULL,
  code_coupon VARCHAR(20) NOT NULL UNIQUE,
  PRIMARY KEY (`idCoupon`))
ENGINE = InnoDB;


-- ------------------------------------------------------
--  TABLE ecommerce.mode_de_paiement
-- ------------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.modes_de_paiement (
  id_mode_de_paiement TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  mode_de_paiement VARCHAR(45) NOT NULL,
  PRIMARY KEY (id_mode_de_paiement),
  UNIQUE INDEX id_mode_de_paiement_UNIQUE (id_mode_de_paiement ASC)
) ENGINE = InnoDB;


-- ------------------------------------------------------
--  TABLE ecommerce.mode_livraison
-- ------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`modes_livraison` (
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

-- ----------------------------------------------------
-- Création de la table collection
-- ----------------------------------------------------
CREATE TABLE collection (
  id_collection MEDIUMINT UNSIGNED AUTO_INCREMENT,
  collection VARCHAR(50) NOT NULL,
  id_editeur MEDIUMINT UNSIGNED NOT NULL,
  PRIMARY KEY (id_collection),
  CONSTRAINT collection_to_editeur
  FOREIGN KEY (id_editeur)
  REFERENCES editeurs(id_editeur)
)ENGINE = Innodb;

-- -----------------------------------------------------
-- Table ecommerce.commandes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.commandes (
  num_commande INT UNSIGNED NOT NULL AUTO_INCREMENT,
  date_commande DATE NOT NULL,
  date_expedition DATE ,
  date_livraison DATE ,
  id_client INT UNSIGNED NOT NULL,
  id_mode_livraison TINYINT UNSIGNED NOT NULL,
  id_coupon MEDIUMINT UNSIGNED NOT NULL,
  id_adresse INT UNSIGNED NOT NULL,
  id_statut TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (num_commande),
  INDEX fk_commandes_clients_idx (id_client ASC),
  UNIQUE INDEX id_client_UNIQUE (id_client ASC),
  INDEX fk_commandes_mode_livraison1_idx (id_mode_livraison ASC),
  INDEX fk_commandes_coupons1_idx (id_coupon ASC),
  INDEX fk_commandes_adresses1_idx (id_adresse ASC),
  UNIQUE INDEX id_mode_livraison_UNIQUE (id_mode_livraison ASC),
  UNIQUE INDEX coupons_idCoupon_UNIQUE (id_coupon ASC),
  UNIQUE INDEX adresses_id_adresses_UNIQUE (id_adresse ASC),
  INDEX fk_commandes_statut_de_commande1_idx (id_statut ASC),
  UNIQUE INDEX id_statut_UNIQUE (id_statut ASC),
  CONSTRAINT fk_commandes_clients
  FOREIGN KEY (id_client)
  REFERENCES ecommerce.clients (id_client)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_commandes_mode_livraison1
  FOREIGN KEY (id_mode_livraison)
  REFERENCES ecommerce.modes_livraison (id_mode_livraison)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_commandes_coupons1
  FOREIGN KEY (id_coupon)
  REFERENCES ecommerce.Coupons (id_coupon)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_commandes_adresses1
  FOREIGN KEY (id_adresse)
  REFERENCES ecommerce.adresses (id_adresse)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_commandes_statut_de_commande1
  FOREIGN KEY (id_statut)
  REFERENCES ecommerce.statuts_de_commande (id_statut)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;

-- ----------------------------------------------------
-- Création de la table panier
-- ----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Panier` (
  `Quantite` VARCHAR(30) NULL,
  `Produit` INT NOT NULL,
  `Client` INT NOT NULL,
  INDEX `fk_Panier_livres_idx` (`Produit` ASC),
  INDEX `fk_Panier_clients1_idx` (`Client` ASC),
  CONSTRAINT `fk_Panier_livres`
  FOREIGN KEY (`Produit`)
  REFERENCES ecommerce.`livres` (`id_livre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Panier_clients1`
  FOREIGN KEY (`Client`)
  REFERENCES ecommerce.`clients` (`id_client`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;

CREATE TABLE ecommerce.lignes_commandes(
  id_commande INT UNSIGNED NOT NULL,
  id_livre INT UNSIGNED NOT NULL,
  qte TINYINT UNSIGNED NOT NULL,
  INDEX fk_id_commande_idx (id_commande),
  INDEX fk_id_livre_idx (id_livre),
  CONSTRAINT fk_id_commande FOREIGN KEY(id_commande)
  REFERENCES ecommerce.commandes (id_commande)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_id_livre FOREIGN KEY(id_livre)
  REFERENCES ecommerce.livres (id_livre)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)ENGINE = InnoDB;
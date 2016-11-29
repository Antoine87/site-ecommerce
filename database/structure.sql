/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;


CREATE TABLE IF NOT EXISTS `mydb`.`mode_livraison` (
  `id_mode_livraison` INT NOT NULL,
  `description_mode_livraison` VARCHAR(45) NULL,
  `tarif_livraison` DECIMAL(2) NULL,
  `delais_livraison` INT NULL,
  PRIMARY KEY (`id_mode_livraison`))
ENGINE = InnoDB;

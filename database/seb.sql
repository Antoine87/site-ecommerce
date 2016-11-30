-- -----------------------------------------------------
-- Table `ecommerce`.`paiement`  manque 2 fk a mettre
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS`ecommerce`.`paiement` (



CREATE TABLE `paiement` (
	`id_commande` TINYTEXT NULL,
	`id_client`  TINYINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`montant` DECIMAL(10,0) NULL DEFAULT NULL,
	`date de paiement` DATETIME NULL DEFAULT NULL,
	`id_mode_de_paiement` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
	UNIQUE INDEX `id_mode_de_paiement` (`id_mode_de_paiement`),
	CONSTRAINT `FK_paiement_mode_de_paiement` FOREIGN KEY (`id_mode_de_paiement`) REFERENCES `mode_de_paiement` (`id_mode_de_paiement`),
	CONSTRAINT `FK_paiement_client` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`),
	CONSTRAINT `FK_paiement_mode_de_paiement` FOREIGN KEY (`id_mode_de_paiement`) REFERENCES `mode_de_paiement` (`id_mode_de_paiement`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;




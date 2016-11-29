-- -----------------------------------------------------
-- Table `ecommerce`.`paiement`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS`ecommerce`.`paiement` (
	`id_commande` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`id_client` TINYTEXT NULL,
	`montant` DECIMAL(10,0) NULL DEFAULT NULL,
	`date de paiement` DATETIME NULL DEFAULT NULL,
	`id_mode_paiement` TINYTEXT NULL
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

///  les fk sont à redéfinir


INDEX `fk_paiement_clients1` (`id_client` ASC),
  CONSTRAINT `fk_paiment_clients1`
    FOREIGN KEY (`id_client`)
    REFERENCES `ecommerce`.`clients` (`id_client`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


INDEX `fk_paiement_mode_paiement1` (`id_client` ASC),
  CONSTRAINT `fk_paiement_mode_paiement`
    FOREIGN KEY (`id_mode_paiement`)
    REFERENCES `ecommerce`.`clients` (`id_client`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `mydb`.`Panier` (
  `Quantite` VARCHAR(30) NULL,
  `Produit` INT NOT NULL,
  `Client` INT NOT NULL,
  INDEX `fk_Panier_livres_idx` (`Produit` ASC),
  INDEX `fk_Panier_clients1_idx` (`Client` ASC),
  CONSTRAINT `fk_Panier_livres`
    FOREIGN KEY (`Produit`)
    REFERENCES `mydb`.`livres` (`id_livres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Panier_clients1`
    FOREIGN KEY (`Client`)
    REFERENCES `mydb`.`clients` (`id_clients`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
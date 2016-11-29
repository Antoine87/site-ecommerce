/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/



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




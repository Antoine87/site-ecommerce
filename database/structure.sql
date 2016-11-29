/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Coupon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Coupon` (
  `idCoupon` INT NULL,
  `Date-debut` DATE NULL,
  `Date-fin` DATE NULL,
  `Remise` FLOAT NULL,
  PRIMARY KEY (`idCoupon`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

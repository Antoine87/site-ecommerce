/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

CREATE TABLE IF NOT EXISTS statut_de_commmande (
    statut VARCHAR(255),
    PRIMARY KEY (statut))
ENGINE = innoDB;


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


--------------------------------------------------------
--  TABLE ecommerce.mode_de_paiement
--------------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.mode_de_paiement (
  id_mode_de_paiement INT NOT NULL,
  mode_de_paiement VARCHAR(45) NOT NULL,
  PRIMARY KEY (id_mode_de_paiement),
  UNIQUE INDEX id_mode_de_paiement_UNIQUE (id_mode_de_paiement ASC))
  ENGINE = InnoDB;


--------------------------------------------------------
--  TABLE ecommerce.mode_livraison
--------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`mode_livraison` (
  `id_mode_livraison` INT NOT NULL,
  `description_mode_livraison` VARCHAR(45) NULL,
  `tarif_livraison` DECIMAL(2) NULL,
  `delais_livraison` INT NULL,
  PRIMARY KEY (`id_mode_livraison`))
  ENGINE = InnoDB;


--------------------------------------------------------
--  TABLE ecommerce.mode_editeurs
--------------------------------------------------------

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


--------------------------------------------------------
--  TABLE ecommerce.roles_auteurs
--------------------------------------------------------
CREATE TABLE `ecommerce`.`roles_auteurs` (
  id_role INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(id_role)
);


INSERT INTO ecommerce.mode_de_paiement (mode_de_paiement) VALUES ('espece');
INSERT INTO ecommerce.mode_de_paiement (mode_de_paiement) VALUES ('carte bleu');
INSERT INTO ecommerce.mode_de_paiement (mode_de_paiement) VALUES ('cheque');

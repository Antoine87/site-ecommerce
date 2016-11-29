/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;


/* creation de la table mode de paiement*/
CREATE TABLE IF NOT EXISTS ecommerce.mode_de_paiement (
  id_mode_de_paiement INT NOT NULL,
  mode_de_paiementcol VARCHAR(45) NOT NULL,
  PRIMARY KEY (id_mode_de_paiement),
  UNIQUE INDEX idmode_de_paiement_UNIQUE (id_mode_de_paiement ASC))
ENGINE = InnoDB;

INSERT INTO ecommerce.mode_de_paiement (mode_de_paiementcol) VALUES ('espece');
INSERT INTO ecommerce.mode_de_paiement (mode_de_paiementcol) VALUES ('carte bleu');
INSERT INTO ecommerce.mode_de_paiement (mode_de_paiementcol) VALUES ('cheque');

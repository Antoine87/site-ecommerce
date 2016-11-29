/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

CREATE TABLE langues (
id_langue SMALLINT NOT NULL AUTO_INCREMENT,
nom_langue VARCHAR(20) NOT NULL,
  PRIMARY KEY (id_langue)
) ENGINE = INNODB;
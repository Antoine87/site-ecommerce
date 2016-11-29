/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

CREATE TABLE langues (
id INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(20) NOT NULL,
  PRIMARY KEY (id)
)
  ENGINE = INNODB;
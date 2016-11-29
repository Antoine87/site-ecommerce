/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

CREATE TABLE roles_auteurs (
  id_role INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(id_role)
);


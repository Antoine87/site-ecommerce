/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

CREATE TABLE [IF NOT EXISTS] statut_de_commmande (
    statut VARCHAR(255),
    [PRIMARY KEY (statut)]
)
[ENGINE=innoDB];
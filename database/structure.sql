/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

CREATE TABLE IF NOT EXISTS statut_de_commmande (
    statut VARCHAR(255),
    PRIMARY KEY (statut))
ENGINE = innoDB;


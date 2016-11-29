

-- ----------------------------------------------------
-- Création de la table collection
-- ----------------------------------------------------
CREATE TABLE collection (
  id_collection MEDIUMINT UNSIGNED AUTO_INCREMENT,
  collection VARCHAR(50) NOT NULL,
  id_editeur MEDIUMINT UNSIGNED NOT NULL,
  PRIMARY KEY (id_collection),
  CONSTRAINT collection_to_editeur
    FOREIGN KEY (id_editeur)
    REFERENCES editeurs(id_editeur)
)ENGINE = Innodb;
-- -----------------------------------------------------
-- Table `ecommerce`.`livres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.livres (
  id_livres INT UNSIGNED NOT NULL AUTO_INCREMENT,
  rubrique VARCHAR(70) NOT NULL,
  titre VARCHAR(70) NOT NULL,
  id_langue TINYINT(3) UNSIGNED NOT NULL,
  resume TEXT NOT NULL DEFAULT 'le resumé',
  table_des_matieres VARCHAR(45) NOT NULL,
  accroche TEXT NULL DEFAULT 'ajouter une accroche',
  date_parution DATE NOT NULL,
  id_editeur MEDIUMINT(8) UNSIGNED NOT NULL,
  id_collection VARCHAR(45) NOT NULL,
  id_format TINYINT UNSIGNED NOT NULL,
  dimension_h TINYINT UNSIGNED NOT NULL DEFAULT 0,
  dimension_l TINYINT UNSIGNED NOT NULL DEFAULT 0,
  dimension_p TINYINT UNSIGNED NOT NULL DEFAULT 0,
  poids TINYINT UNSIGNED NOT NULL DEFAULT 0,
  nb_pages INT UNSIGNED NOT NULL,
  format VARCHAR(45) NOT NULL,
  ISBN_11 VARCHAR(11) NOT NULL,
  ISBN_13 VARCHAR(13) NOT NULL,
  couverture VARCHAR(200) NULL,
  prix DECIMAL(5,2) UNSIGNED NOT NULL,
  stock INT UNSIGNED NOT NULL,
  edition VARCHAR(70) NOT NULL,
  PRIMARY KEY (id_livres),
  UNIQUE INDEX ISBN_13 (ISBN_13 ASC),

  CONSTRAINT fk_livres_langues
    FOREIGN KEY (id_langue)
    REFERENCES ecommerce.langues (id_langue)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,

  CONSTRAINT fk_livres_editeurs
    FOREIGN KEY (id_editeur)
    REFERENCES ecommerce.editeurs (id_editeur)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,

  CONSTRAINT fk_livres_langues
  FOREIGN KEY (id_collection)
  REFERENCES ecommerce.collections (id_collection)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,

  CONSTRAINT fk_livres_formats
  FOREIGN KEY (id_format)
  REFERENCES ecommerce.formats (id_format)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION

)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `ecommerce`.`formats`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS ecommerce.formats(
  id_format TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  format VARCHAR(30) NOT NULL
)ENGINE = InnoDB;

INSERT INTO ecommerce.formats (format) VALUES ('Broché');
INSERT INTO ecommerce.formats (format) VALUES ('Relié');
INSERT INTO ecommerce.formats (format) VALUES ('Ebook Kindle');
INSERT INTO ecommerce.formats (format) VALUES ('Poche');
INSERT INTO ecommerce.formats (format) VALUES ('Livre audio');

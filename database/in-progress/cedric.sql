CREATE TABLE IF NOT EXISTS commentaires_livres (
  id_commentaire INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  note INTEGER UNSIGNED NOT NULL,
  titre_commentaire VARCHAR(255) NOT NULL,
  date_commentaire DATE NOT NULL,
  livre_commentaire VARCHAR(45) NOT NULL,
  auteur_commentaire VARCHAR(45) NOT NULL,
  PRIMARY KEY(id_commentaire),
    CONSTRAINT fk_livre_commentaire FOREIGN KEY (livre_commentaire) REFERENCES livres (id_livre),
    CONSTRAINT fk_client_commentaire FOREIGN KEY (auteur_commentaire) REFERENCES clients (id_client)
)ENGINE = InnoDB;





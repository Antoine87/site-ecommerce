CREATE TABLE ecommerce.lignes_commandes(
id_commande INT UNSIGNED NOT NULL,
id_livre INT UNSIGNED NOT NULL,
qte TINYINT UNSIGNED NOT NULL,
PRIMARY KEY (id_commande,id_livre),
UNIQUE commande_livre_idx (id_commande,id_livre),
CONSTRAINT fk_id_commande FOREIGN KEY(id_commande)
 REFERENCES ecommerce.commandes (id_commande)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION,
CONSTRAINT fk_id_livre FOREIGN KEY(id_livre)
 REFERENCES ecommerce.livres (id_livre)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION
)ENGINE = InnoDB;
SET foreign_key_checks = 1;
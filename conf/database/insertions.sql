/**************************************************************
* INSERTIONS DES DONNEES
***************************************************************/
SET FOREIGN_KEY_CHECKS = 0;
USE ecommerce;
-- ----------------------------------------------------
-- Ajout de données pour les modes de paiement
-- ----------------------------------------------------
TRUNCATE  ecommerce.modes_de_paiement;
INSERT INTO ecommerce.modes_de_paiement (mode_de_paiement) VALUES ('espece');
INSERT INTO ecommerce.modes_de_paiement (mode_de_paiement) VALUES ('carte bleu');
INSERT INTO ecommerce.modes_de_paiement (mode_de_paiement) VALUES ('cheque');

-- ----------------------------------------------------
-- Ajout de données pour les statuts de commande
-- ----------------------------------------------------
# RAZ sur la table
TRUNCATE ecommerce.statuts_de_commande;
INSERT INTO ecommerce.statuts_de_commande (statut)
VALUES
  ('en-cours'),
  ('payée'),
  ('expédiée'),
  ('livrée'),
  ('annulée');

-- ----------------------------------------------------
-- Ajout de données pour les rôles des auteurs, les langues et les éditeurs
-- ----------------------------------------------------
TRUNCATE ecommerce.langues;
TRUNCATE ecommerce.editeurs;
TRUNCATE ecommerce.roles_auteurs;
INSERT INTO langues (id_langue, nom_langue) VALUES (NULL, 'français'), (NULL, 'anglais');
INSERT INTO editeurs (id_editeur, nom_editeur) VALUES (NULL, 'POCKET'), (NULL, 'Albin Michel'), (NULL, 'Le Livre de Poche'), (NULL, 'Gallimard'), (NULL, 'Les Editions Persée');
INSERT INTO roles_auteurs (id_role, role) VALUES (NULL, 'auteur'), (NULL, 'traducteur');

-- ------------------------------------------------------
--  INSERT ecommerce.clients
-- ------------------------------------------------------
TRUNCATE ecommerce.clients;
INSERT INTO ecommerce.clients
(nom, prenom, email, mot_de_passe, date_naissance)
VALUES
  ('Sarkozy', 'Sebastien', 'mail@mail.com', 'mdp123', '1990-01-01'),
  ('Hollande', 'Pascal', 'mail@mail.com', 'mdp123', '1970-05-01'),
  ('Obama', 'Didier', 'mail@mail.com', 'mdp123', '1925-10-01'),
  ('Fillon', 'Karl', 'mail@mail.com', 'mdp123', '1950-01-01'),
  ('Mitterand', 'Sebastien', 'mail@mail.com', 'mdp123', '1968-09-01'),
  ('Pompidou', 'Antoine', 'mail@mail.com', 'mdp123', '1982-01-01');

-- ------------------------------------------------------
--  INSERT ecommerce.auteurs
-- ------------------------------------------------------
TRUNCATE ecommerce.auteurs;
INSERT INTO ecommerce.auteurs
(nom_auteur, prenom_auteur, biographie)
VALUES
  ('De Lafontaine', 'Jean', 'On dispose de très peu d’informations sur les années de formation de Jean de La Fontaine'),
  ('Wilde', 'Oscar', 'Oscar Wilde est né au 21, Westland Row à Dublin'),
  ('Herbert', 'Frank', 'Frank Herbert est né le 8 octobre 1920 à Tacoma dans l\'État de Washington, de Frank Herbert et Eileen McCarthy Herbert.'),
  ('Maupin', 'armistead', 'Ses parents sont Diana Jane (née Barton) et Armistead Jones Maupin'),
  ('Asimov', 'Isaac', 'Issu d\'une famille juive, fils de Judah Asimov et de Anna Rachel Berman, Isaac naquit à Petrovitchi'),
  ('Zola', 'Emile', 'Émile Édouard Charles Antoine Zola naît 10 rue Saint-Joseph à Paris, le 2 avril 1840, d\'un père italien et d\'une mère française');

-- ------------------------------------------------------
--  INSERT ecommerce.formats
-- ------------------------------------------------------
TRUNCATE ecommerce.formats;
INSERT INTO ecommerce.formats (format) VALUES ('Broché');
INSERT INTO ecommerce.formats (format) VALUES ('Relié');
INSERT INTO ecommerce.formats (format) VALUES ('Ebook Kindle');
INSERT INTO ecommerce.formats (format) VALUES ('Poche');
INSERT INTO ecommerce.formats (format) VALUES ('Livre audio');

-- ------------------------------------------------------
--  IMPORTATION DES LIVRES depuis un fichier csv
-- ------------------------------------------------------
TRUNCATE  livres;
LOAD DATA INFILE
  '/var/lib/mysql-files/livres.csv'
INTO TABLE livres
FIELDS
TERMINATED BY ';'
ENCLOSED BY '"'
LINES
TERMINATED BY '\r\n'
IGNORE 1 LINES

(titre,rubrique,id_langue,resume,
 table_des_matieres,accroche,@dateParution,id_editeur,
 id_collection,@dimensions,poids,nb_pages,id_format,
 ISBN_11,ISBN_13,@prix,stock,couverture,edition)
SET
  prix= REPLACE(@prix,",","."),
  date_parution=str_to_date(@dateParution,'%d/%m/%y');

-- ------------------------------------------------------
--  INSERTION DES AUTEURS POUR LES LIVRES
-- ------------------------------------------------------
TRUNCATE auteurs_livres;
INSERT INTO auteurs_livres
(id_livre, id_auteur, id_role) VALUES
  (1,1,1), (2,3,1), (3,5,1), (4,5,1), (5,1,1),
  (6,4,1), (7,6,1), (8,1,1), (9,6,1), (10,4,1),
  (11,3,1), (12,4,1), (13,3,1), (14,3,1), (15,5,1),
  (16,5,1), (17,5,1), (18,2,1), (19,1,1), (20,5,1),
  (21,2,1), (22,5,1), (23,6,1), (24,2,1), (25,2,1),
  (25,3,1),(2,1,1),(13,2,1),(11,1,2),(1,4,2),(7,1,2);

-- Autre méthode d'insertion d'auteurs avec attribution aléatoire
/*
INSERT INTO auteurs_livres
(id_livre, id_auteur, id_role)
  (
    SELECT
      id_livre,
      (SELECT id_auteur FROM auteurs ORDER BY RAND() LIMIT 1) as id_auteur,
      1 as id_role
    FROM livres
  );
*/

SET FOREIGN_KEY_CHECKS = 1;


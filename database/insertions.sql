/**************************************************************
* INSERTIONS DES DONNEES
***************************************************************/

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
TRUNCATE `ecommerce`.`langues`;
TRUNCATE `ecommerce`.`editeurs`;
TRUNCATE `ecommerce`.`roles_auteurs`;
INSERT INTO `langues` (`id_langue`, `nom_langue`) VALUES (NULL, 'français'), (NULL, 'anglais');
INSERT INTO `editeurs` (`id_editeur`, `nom_editeur`) VALUES (NULL, 'POCKET'), (NULL, 'Albin Michel'), (NULL, 'Le Livre de Poche'), (NULL, 'Gallimard'), (NULL, 'Les Editions Persée');
INSERT INTO `roles_auteurs` (`id_role`, `role`) VALUES (NULL, 'auteur'), (NULL, 'traducteur');

-- ------------------------------------------------------
--  INSERT `ecommerce`.`clients`
-- ------------------------------------------------------
TRUNCATE `ecommerce`.`clients`;
INSERT INTO `ecommerce`.`clients`
(`nom`, `prenom`, `email`, `mot_de_passe`, `date_naissance`)
VALUES
  ('Sarkozy', 'Sebastien', 'mail@mail.com', 'mdp123', '1880-01-01'),
  ('Hollande', 'Pascal', 'mail@mail.com', 'mdp123', '1880-01-01'),
  ('Obama', 'Didier', 'mail@mail.com', 'mdp123', '1880-01-01'),
  ('Fillon', 'Karl', 'mail@mail.com', 'mdp123', '1880-01-01'),
  ('Mitterand', 'Sebastien', 'mail@mail.com', 'mdp123', '1880-01-01'),
  ('Pompidou', 'Antoine', 'mail@mail.com', 'mdp123', '1880-01-01');
INSERT INTO `ecommerce`.`clients`
  (`nom`, `prenom`, `email`, `mot_de_passe`, `date_naissance`)
VALUES
  ('Sarkozy', 'Sebastien', 'mail@mail.com', 'mdp123', '1880-01-01'),
  ('Hollande', 'Pascal', 'mail@mail.com', 'mdp123', '1880-01-01'),
  ('Obama', 'Didier', 'mail@mail.com', 'mdp123', '1880-01-01'),
  ('Fillon', 'Karl', 'mail@mail.com', 'mdp123', '1880-01-01'),
  ('Mitterand', 'Sebastien', 'mail@mail.com', 'mdp123', '1880-01-01'),
  ('Pompidou', 'Antoine', 'mail@mail.com', 'mdp123', '1880-01-01');


INSERT INTO `ecommerce`.`adresses`
  (`adresse`, `code_postal`, `ville`, `est_adresse_facturation`, id_client)
VALUES
  ('rue des Buguets', '75012', 'Toulouse', "c'est quoi l'adresse facturation ???", 1),
  ('rue des Muguets', '75013', 'Nice', "c'est quoi l'adresse facturation ???", 2),
  ('rue des Budgets', '75014', 'Lyon', "c'est quoi l'adresse facturation ???", 3),
  ('rue des Débugé', '75015', 'Nantes', "c'est quoi l'adresse facturation ???", 4);

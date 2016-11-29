-- -----------------------------------------------------
-- Table ecommerce.commandes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ecommerce.commandes (
  num_commande INT UNSIGNED NOT NULL AUTO_INCREMENT,
  date_commande DATE NOT NULL,
  date_expedition DATE NOT NULL,
  date_livraison DATE NOT NULL,
  id_client INT UNSIGNED NOT NULL,
  id_mode_livraison TINYINT UNSIGNED NOT NULL,
  coupons_idCoupon MEDIUMINT UNSIGNED NOT NULL,
  adresses_id_adresses INT UNSIGNED NOT NULL,
  id_statut TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (num_commande),
  INDEX fk_commandes_clients_idx (id_client ASC),
  UNIQUE INDEX id_client_UNIQUE (id_client ASC),
  INDEX fk_commandes_mode_livraison1_idx (id_mode_livraison ASC),
  INDEX fk_commandes_coupons1_idx (coupons_idCoupon ASC),
  INDEX fk_commandes_adresses1_idx (adresses_id_adresses ASC),
  UNIQUE INDEX id_mode_livraison_UNIQUE (id_mode_livraison ASC),
  UNIQUE INDEX coupons_idCoupon_UNIQUE (coupons_idCoupon ASC),
  UNIQUE INDEX adresses_id_adresses_UNIQUE (adresses_id_adresses ASC),
  INDEX fk_commandes_statut_de_commande1_idx (id_statut ASC),
  UNIQUE INDEX id_statut_UNIQUE (id_statut ASC),
  CONSTRAINT fk_commandes_clients
    FOREIGN KEY (id_client)
    REFERENCES ecommerce.clients (id_client)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_commandes_mode_livraison1
    FOREIGN KEY (id_mode_livraison)
    REFERENCES ecommerce.mode_livraison (id_mode_livraison)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_commandes_coupons1
    FOREIGN KEY (coupons_idCoupon)
    REFERENCES ecommerce.coupons (idCoupon)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_commandes_adresses1
    FOREIGN KEY (adresses_id_adresses)
    REFERENCES ecommerce.adresses (id_adresses)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_commandes_statut_de_commande1
    FOREIGN KEY (id_statut)
    REFERENCES ecommerce.statut_de_commande (id_statut)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
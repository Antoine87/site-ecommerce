USE `ecommerce`;


DELIMITER $$

DROP TRIGGER IF EXISTS ecommerce.paiements_AFTER_INSERT$$
USE `ecommerce`$$
CREATE DEFINER=`root`@`localhost` TRIGGER `ecommerce`.`paiements_AFTER_DELETE` AFTER DELETE ON `paiements` FOR EACH ROW
  BEGIN
    UPDATE commandes set id_statut=2
    WHERE num_commande=NEW.id_commande;
  END$$
DELIMITER ;

DELIMITER $$

DROP TRIGGER IF EXISTS ecommerce.paiements_AFTER_DELETE$$
USE `ecommerce`$$
CREATE DEFINER=`root`@`localhost` TRIGGER `ecommerce`.`paiements_AFTER_DELETE` AFTER DELETE ON `paiements` FOR EACH ROW
  BEGIN
    UPDATE commandes set id_statut=1
    WHERE num_commande=OLD.id_commande;
  END$$
DELIMITER ;

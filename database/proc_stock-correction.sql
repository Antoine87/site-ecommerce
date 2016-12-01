USE `ecommerce`;
DROP procedure IF EXISTS `insert_client_adresse`;

DELIMITER $$
USE `ecommerce`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_client_adresse`(
  p_nom VARCHAR(45),
  p_prenom VARCHAR(45),
  p_email VARCHAR(50),
  p_motDePasse VARCHAR(20),
  p_dateNaissance DATE,
  p_adresse VARCHAR(50),
  p_codePostal CHAR(5),
  p_ville VARCHAR(45),
  p_estAdresseFacturation TINYINT
)
  BEGIN

    -- variable de session pour stocker l'id client généré
    SET @idClient = NULL;

    -- Insertion du client
    CALL insert_client(
        p_nom,
        p_prenom,
        p_email,
        p_motDePasse,
        p_dateNaissance,
        @idClient
    );

    -- Insertion de l'adresse si insertion du client OK
    IF @idClient IS NOT NULL THEN
      CALL insert_adresse (
          p_adresse,
          p_codePostal,
          p_ville,
          p_estAdresseFacturation,
          @idClient
      );
    END IF;

  END$$

DELIMITER ;

USE `ecommerce`;
DROP procedure IF EXISTS `insert_client`;

DELIMITER $$
USE `ecommerce`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_client`(
      p_nom VARCHAR(45),
      p_prenom VARCHAR(45),
      p_email VARCHAR(50),
      p_motDePasse VARCHAR(20),
      p_dateNaissance DATE,
  OUT p_idClient INT)
  BEGIN
    DECLARE valid TINYINT DEFAULT 0;

    SET valid = p_nom IS NOT NULL
                AND p_motDePasse IS NOT NULL
                AND p_email IS NOT NULL;

    SELECT id_client FROM clients WHERE email=p_email
    INTO p_idClient;

    IF valid AND p_idClient is null THEN
      INSERT INTO clients
      (nom, prenom, email, mot_de_passe, date_naissance)
      VALUES
        (p_nom, p_prenom, p_email, SHA1(p_motDePasse), p_dateNaissance);

      SET p_idClient = LAST_INSERT_ID();
    END IF;


  END$$

DELIMITER ;

USE `ecommerce`;
DROP procedure IF EXISTS `insert_adresse`;

DELIMITER $$
USE `ecommerce`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_adresse`(

  p_adresse VARCHAR(50),
  p_codePostal CHAR(5),
  p_ville VARCHAR(45),
  p_estAdresseFacturation TINYINT,
  p_idClient INT

)
  BEGIN

    DECLARE valid TINYINT DEFAULT 0;

    SET valid = p_adresse IS NOT NULL
                AND p_codePostal IS NOT NULL
                AND p_ville IS NOT NULL
                AND p_idClient IS NOT NULL;

    IF valid THEN

      IF p_estAdresseFacturation = 1 THEN
        UPDATE adresses SET est_adresse_facturation = 0
        WHERE id_client=p_idClient;
      END IF;

      INSERT INTO adresses
      (adresse, code_postal, ville,
       est_adresse_facturation, id_client)
      VALUES
        (p_adresse, p_codePostal, p_ville,
         p_estAdresseFacturation, p_idClient);
    END IF;

  END$$

DELIMITER ;


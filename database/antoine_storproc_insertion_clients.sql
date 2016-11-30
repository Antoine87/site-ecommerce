-- --------------------------------------------------------------
-- Procedure ecommerce.insert_nouveau_client()
-- --------------------------------------------------------------
DROP PROCEDURE IF EXISTS ecommerce.insert_nouveau_client;

DELIMITER $$

CREATE PROCEDURE ecommerce.insert_nouveau_client (
    IN p_nom VARCHAR(45),
    IN p_prenom VARCHAR(45),
    IN p_email VARCHAR(50),
    IN p_motDePasse VARCHAR(128),
    IN p_dateNaissance DATE,
    IN p_numeroTelephone VARCHAR(10),
    IN p_adresse VARCHAR(45),
    IN p_codePostal VARCHAR(5),
    IN p_ville VARCHAR(45),
    IN p_estAdresseFacturation BIT(1)
)
BEGIN
    /* Insertion table clients */
    INSERT INTO ecommerce.clients
        (nom, prenom, email, mot_de_passe, date_naissance)
    VALUES (
        p_nom,
        p_prenom,
        p_email,
        p_motDePasse,
        p_dateNaissance
    );

    /* Récupération de l'id du client insérer */
    SET @idClient := LAST_INSERT_ID();

    /* Insertion table telephones */
    INSERT INTO ecommerce.telephones
        (numero_telephone, id_client)
    VALUES (
        p_numeroTelephone,
        @idClient
    );

    /* Insertion table adresses */
    INSERT INTO ecommerce.adresses
        (adresse, code_postal, ville, est_adresse_facturation, id_client)
    VALUES (
        p_adresse,
        p_codePostal,
        p_ville,
        p_estAdresseFacturation,
        @idClient
    );
END $$

DELIMITER ;

-- --------------------------------------------------------------
-- Procedure ecommerce.insert_nouveau_client()
--
-- Ajoute un client avec son adresse et son numéro de téléphone.
-- Vérifie si le nom ou le prénom n'est pas NULL
--
-- Retourne 1 dans la variable p_erreur si la vérification à
-- réussi, sinon un message d'erreur dans la variable p_message.
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
    IN p_estAdresseFacturation BIT(1),
    OUT p_erreur BIT(1),
    OUT p_message VARCHAR(255)
)
BEGIN
    DECLARE v_id_client INT;

    IF p_nom IS NULL THEN

        SET p_erreur := 1;
        SET p_message := 'Le nom ne peut être NULL';

    ELSEIF p_prenom IS NULL THEN

        SET p_erreur := 1;
        SET p_message := 'Le prenom ne peut être NULL';

    ELSE

        /* Insertion table clients */
        INSERT INTO ecommerce.clients
            (nom, prenom, email, mot_de_passe, date_naissance)
        VALUES (
            UCASE(p_nom),
            p_prenom,
            p_email,
            p_motDePasse,
            p_dateNaissance
        );

        /* Récupération de l'id du client insérer */
        SET v_id_client := LAST_INSERT_ID();

        /* Insertion table telephones */
        INSERT INTO ecommerce.telephones
            (numero_telephone, id_client)
        VALUES (
            p_numeroTelephone,
            v_id_client
        );

        /* Insertion table adresses */
        INSERT INTO ecommerce.adresses
            (adresse, code_postal, ville, est_adresse_facturation, id_client)
        VALUES (
            p_adresse,
            p_codePostal,
            p_ville,
            p_estAdresseFacturation,
            v_id_client
        );

        SET p_erreur := 0;
        SET p_message := 'OK';

    END IF;
END $$

DELIMITER ;

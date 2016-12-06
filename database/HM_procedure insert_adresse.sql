CREATE DEFINER=`root`@`localhost` PROCEDURE `adresse_insert`(
        p_adresse VARCHAR(100),
        p_code_postal VARCHAR(5),
        p_ville VARCHAR(30),
        p_personne_id INT,
        p_facturation BOOLEAN,
        OUT p_message VARCHAR(32)
)
BEGIN


DECLARE v_facturation INT;
DECLARE v_id_adresse INT;
DECLARE v_context TINYINT DEFAULT -1;



-- on test si un champ n'est pas nul
IF p_adresse IS NOT NULL
AND p_code_postal IS NOT NULL
AND p_ville IS NOT NULL
AND p_personne_id IS NOT NULL
AND p_facturation IS NOT NULL

THEN


	-- verification si cette adresse exist pour ce client

	SELECT ad.id_adresse
	FROM adresses as ad
	WHERE ad.id_client = p_personne_id AND ad.adresse = p_adresse AND ad.code_postal= p_code_postal
	INTO v_id_adresse;


CASE true

-- dans le cas ou cette adresse n'existe pas deja
WHEN v_id_adresse IS NULL THEN

		-- si le client veut choisir cette adresse en facturation
		IF p_facturation IS TRUE THEN

		-- on verifie si le client a une adresse de facturation
		SELECT id_adresse FROM adresses
        WHERE id_client = p_personne_id AND est_adresse_facturation = '1'
        INTO v_facturation;


			CASE true
				-- si le client a deja une adresse de facturation,
				WHEN v_facturation IS NOT NULL THEN

					-- on modifie son ancienne adresse de facturation a 0
					UPDATE adresses SET est_adresse_facturation = false WHERE id_adresse = v_facturation AND id_client = p_personne_id;

					-- on insert sa nouvelle adresse de facturation dans la table
					INSERT INTO
						adresses(adresse,code_postal, ville, est_adresse_facturation, id_client)
					VALUES
						(p_adresse,p_code_postal,p_ville,p_facturation,p_personne_id);

					SET v_context := 4;

				WHEN v_facturation IS NULL THEN

					-- on insert sa nouvelle adresse de facturation dans la table
					INSERT INTO
						adresses(adresse, code_postal, ville, est_adresse_facturation, id_client)
					VALUES
						(p_adresse,p_code_postal,p_ville,p_facturation,p_personne_id);

					SET v_context := 1;

				ELSE BEGIN END;


			END CASE;


		-- si le client veut uniquement rentrer une nouvelle adresse
		ELSEIF p_facturation IS FALSE THEN

			-- on insert sa nouvelle adresse dans la table
			INSERT INTO
				adresses(adresse, code_postal, ville, est_adresse_facturation, id_client)
			VALUES
				(p_adresse,p_code_postal,p_ville,p_facturation,p_personne_id);

			SET v_context := 2;


		END IF;-- v_facturation


-- dans le cas ou l'adresse existe deja
WHEN v_id_adresse IS NOT NULL THEN

SET v_context := 3;

ELSE BEGIN END;

END CASE;

ELSE -- si un des champs est nul

SET v_context := 0;

END IF;-- verification d'un champ null

CASE true

	WHEN v_context =-1 THEN SET p_message = "Aucune action effectué";
	WHEN v_context = 0 THEN SET p_message = "Remplisser tous les champs";
    WHEN v_context = 1 THEN SET p_message = "Nouvelle adresse de facturation";
	WHEN v_context = 2 THEN SET p_message = "Nouvelle adresse";
	WHEN v_context = 3 THEN SET p_message = "cette adresse existe deja";
    WHEN v_context = 4 THEN SET p_message = "modification de facturation";
    ELSE BEGIN END;
    
END CASE;
    
END
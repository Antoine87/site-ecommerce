CREATE DEFINER=`root`@`localhost` PROCEDURE `personn_insert`(IN p_nom VARCHAR(45),IN p_prenom VARCHAR(45),IN p_email VARCHAR(50),IN p_mdp VARCHAR(128),IN p_date DATE,OUT p_personn_id INT)
BEGIN
	IF p_nom IS NOT NULL AND TRIM(p_nom) !='' AND
    p_email IS NOT NULL AND TRIM(p_email) !='' AND
    p_mdp IS NOT NULL AND TRIM(p_mdp) !=''
    THEN INSERT INTO ecommerce.clients (nom,prenom,email,mot_de_passe,date_naissance)
    VALUES (p_nom,p_prenom,p_email,p_mdp,p_date);
    SET p_personn_id = LAST_INSERT_ID();
    END IF;
END
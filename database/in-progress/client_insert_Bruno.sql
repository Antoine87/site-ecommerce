CREATE DEFINER=`root`@`localhost` PROCEDURE `client_insert`(IN p_nom VARCHAR(45),IN p_prenom VARCHAR(45),IN p_email VARCHAR(50),IN p_mdp VARCHAR(128),IN p_date DATE,OUT p_personn_id INT,IN p_adress VARCHAR(45),IN p_code_postal VARCHAR(5),IN p_ville VARCHAR(45), IN p_is_bill_adress BIT(1))
BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
 BEGIN
 GET DIAGNOSTICS CONDITION 1
 @p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT;
SELECT false as succes, @p1 as etat, @p2 as message;
END;
SET p_personn_id = NULL;
CALL personn_insert(p_nom,p_prenom,p_email,p_mdp,p_date,p_personn_id);
IF p_personn_id IS NOT NULL THEN
CALL adress_insert(p_adress,p_code_postal,p_ville,p_is_bill_adress,p_personn_id);
 END IF;
END
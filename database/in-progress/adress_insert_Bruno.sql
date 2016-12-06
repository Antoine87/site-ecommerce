CREATE DEFINER=`root`@`localhost` PROCEDURE `adress_insert`(IN p_adress VARCHAR(45),IN p_code_postal VARCHAR(5),IN p_ville VARCHAR(45), IN p_is_bill_adress BIT(1),INOUT p_personn_id INT(10))
BEGIN
IF p_is_bill_adress IS NOT NULL AND p_personn_id IS NOT NULL
 THEN INSERT INTO ecommerce.adresses (adresse,code_postal,ville,est_adresse_facturation,id_client)
 VALUES (p_adress,p_code_postal,p_ville,p_is_bill_adress,p_personn_id);
ELSE SET p_personn_id = NULL;
END IF;
END
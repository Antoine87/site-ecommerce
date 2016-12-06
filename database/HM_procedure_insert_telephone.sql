CREATE PROCEDURE `Insert_telephone` (

p_telephone VARCHAR(10),
p_id_client INT,
OUT v_message VARCHAR(30))

BEGIN

DECLARE v_id_telephone INT;
DECLARE v_id_client INT;
DECLARE v_context TINYINT DEFAULT 0;

-- on verifie si le telephone existe deja
SELECT id_telephones, numero_telephone FROM telephones WHERE numero_telephone = p_telephone INTO v_id_telephone, v_id_client ;

-- si le telephone n'existe pas on l'insert
CASE true

WHEN v_id_telephone IS NULL THEN

	INSERT INTO telephones(numero_telephone, id_client)VALUES(trim(p_telephone), p_id_client);

	SET v_context := 1;

-- si le telephone existe
WHEN v_id_telephone IS NOT NULL THEN

-- si c'est le client qui essaie de rentrer son telephone en double
	IF v_id_client = p_id_client THEN

	SET v_context := 2;

	ELSE
-- si c'est le numero d'un autre client qui existe    

	SET v_context := -1;

	END IF;

END CASE;

CASE true

WHEN v_context = -1 THEN SET v_context = 'ce numero existe deja';
WHEN v_context = 1 THEN SET v_context = 'nouveau numero inserer'; 
WHEN v_context = 2 THEN SET v_context = 'vous avez deja enregistré ce numero'; 
WHEN v_context = 0 THEN SET v_context = ''; 

END CASE;

END

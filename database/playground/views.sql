
CREATE OR REPLACE VIEW vue_client AS
SELECT
  id_client,
  CONCAT_WS(' ',prenom, UCASE(nom)) as nom_complet,
  (YEAR(CURRENT_DATE()) - YEAR(date_naissance)) 
	- IF(MONTH(CURDATE()) < MONTH(date_naissance), 1, 0)
  as age
FROM clients;

-- SELECT * FROM vue_client;

SELECT *,

CASE
	WHEN age <=5 THEN 'bébé'
    WHEN age BETWEEN 6 AND 13 THEN 'enfant'
    WHEN age BETWEEN 14 AND 18 THEN 'ado'
    WHEN age BETWEEN 19 AND 65 THEN 'adulte'
    WHEN age > 65 THEN 'vieux'
END as tranche_age

FROM vue_client;
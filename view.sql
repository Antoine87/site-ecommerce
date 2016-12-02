use ecommerce;

 CREATE OR REPLACE view vue_client AS
SELECT
  id_client,
CONCAT_WS('',prenom, UCASE(nom)) as nom_complet,
YEAR(CURRENT_DATE ())- YEAR(date_naissance) as age
FROM clients;


SELECT * FROM vue_client
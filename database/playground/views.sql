CREATE OR REPLACE VIEW vue_client AS
SELECT
id_client,
CONCAT_WS(' ',prenom,UCASE(nom)) AS nom_complet,
YEAR(CURRENT_DATE() - YEAR(date_naissance)) AS LANGUAGE
FROM clients;

SELECT * FROM vue_client;
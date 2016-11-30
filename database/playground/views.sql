use ecommerce;
CREATE OR REPLACE  VIEW  vue_client as
SELECT
    id_client,
    CONCAT_WS(' ' , prenom, UCASE(nom)) as nom_complet,
    YEAR (CURRENT_DATE()) - YEAR(date_naissance) as age
FROM clients;



select  * from vue_client;
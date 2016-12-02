LOAD DATA INFILE
'C:\\Users\\formation\\Documents\\PHP\\projet-ecommerce-php\\database\\data-source\\livres.csv'
INTO TABLE livres
FIELDS
TERMINATED BY ';'
ENCLOSED BY '"'
LINES
TERMINATED BY '\r\n'
IGNORE 1 LINES

(titre,rubrique,id_langue,resume,
table_des_matieres,accroche,@dateParution,id_editeur,
id_collection,@dimensions,poids,nb_pages,id_format,
ISBN_11,ISBN_13,@prix,stock,couverture,edition)
SET
  prix= REPLACE(@prix,",","."),
  date_parution=str_to_date(@dateParution,'%d/%m/%y');
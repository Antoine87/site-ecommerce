# Dictionnaire de données


- auteurs (Didier)
    - nom
    - prénom
    - biographie
    
- éditeurs (Sébastien)
    - nom
    
- langues (Bruno)
    - langue
    
- collections
    - nom de la collection
    - id_editeur (fk)
   
- auteurs_livres (Mohamed)
    - id_livre (fk) INT UNSIGNED NOT NULL
    - id_auteur (fk)
    - id_role (fk)

- roles_auteurs (Mohamed)
    - role

- livres (Mehdi)
    - titre
    - rubrique 
    - traducteur (table association auteurs_livres)
    - langue de l'ouvrage (fk id_langue)
    - résumé
    - table des matières
    - accroche
    - date de parution
    - éditeur (fk id_editeur)
    - auteurs (table association auteurs_livres)
    - collection (fk id_collection)
    - dimension
    - poids
    - nombre de pages
    - format 
    - isbn 11
    - isbn 13
    - image
    - prix
    - stock
    - édition
    
- commentaires livres (Cédric)
    - note
    - texte
    - titre du commentaire
    - livre (fk id_livre)
    - auteur du commentaire (fk id_client)
    - date de création
    
- clients (Antoine)
    - nom
    - prénom
    - adresses postales (voir adresses)
    - email
    - mot de passe
    - téléphones (voir table téléphones)
    - date de naissance
 
- adresses (Antoine)
    - adresse
    - code postal
    - ville
    - adresse_facturation (booléen)
    - id_client (fk)
    
- téléphones (Antoine)
    - id_client (fk)
    - numéro de téléphone
    
- paniers   (Karl)
    - produit (id_livre fk)
    - qt
    - client (id_client fk)
    
- coupons (Karl)
    - code coupon
    - date début
    - date fin
    - remise
    
- commandes (Didier)
    - numéro de commande
    - client (id_client fk)
    - produits (voir table lignes_commandes)
    - qt (voir table lignes_commandes)
    - coupon (id_coupon fk)
    - date de commande
    - mode de livraison (id_mode_livraison fk)
    - adresse de livraison (id_adresse)
    - statut (id_statut)
    - date d'expédition
    - date de livraison
    
- lignes_commandes (Bruno)
    - id_commande (fk)
    - id_livre (fk)
    - qt
   
- mode de livraison (Pascal)
    - description
    - tarif
    - délai
    
- statut de commande (Cédric)
    - statut
   
- paiement (Sébastien)
    - commande (id_commande fk)
    - client (id_client fk)
    - montant
    - date paiement
    - mode de paiement (id_mode_paiement fk)
    
- mode de paiement (Mehdi)
    - mode de paiement
    
# Insertion de données

- 10 - Clients + adresses (Antoine)
- rôles auteur (auteur, traducteur), langues (français, anglais) et 5 éditeurs (Pascal)'
    
    
    

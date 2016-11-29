# Dictionnaire de données


- auteurs
    - nom
    - prénom
    - biographie
    
- éditeurs
    - nom
- langues
    - langue
    
- collections
    - nom de la collection
    - id_editeur
   
- auteurs_livres
    - id_livre (fk)
    - id_auteur (fk)
    - id_role (fk)

- roles_auteurs
    - role

- livres
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
    
- commentaires livres
    - note
    - texte
    - titre du commentaire
    - livre (fk id_livre)
    - auteur du commentaire (fk id_client)
    - date de création
    
- clients
    - nom
    - prénom
    - adresses postales (voir adresses)
    - email
    - mot de passe
    - téléphones (voir table téléphones)
    - date de naissance
 
- adresses 
    - adresse
    - code postal
    - ville
    - adresse_facturation (booléen)
    - id_client (fk)
    
- téléphones
    - id_client (fk)
    - numéro de téléphone
    
- paniers
    - produit (id_livre fk)
    - qt
    - client (id_client fk)
    
- coupons
    - code coupon
    - date début
    - date fin
    - remise
    
- commandes
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
    
- lignes_commandes
    - id_commande (fk)
    - id_livre (fk)
    - qt
   
- mode de livraison
    - description
    - tarif
    - délai
    
- statut de commande
    - statut
   
- paiement
    - commande (id_commande fk)
    - client (id_client fk)
    - montant
    - date paiement
    - mode de paiement (id_mode_paiement fk)
    
- mode de paiement
    - mode de paiement
    
    
    

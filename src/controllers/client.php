<?php

$connexion = getPDO();

$action = filter_input(INPUT_GET,'action');
$idClient = filter_input(INPUT_GET,'idClient', FILTER_VALIDATE_INT);

//Action transmise en POST par le formulaire
if($action == null){
    $action = filter_input(INPUT_POST,'action');
}

$errorMessage = "";

//Aucune action, affichage de la liste des clients
if($action == null) {
    $sql = "SELECT 
              id_client, nom, prenom, 
              email, 
              DATE_FORMAT(date_naissance, '%d/%m/%Y') as date_naissance 
            FROM clients";

    try {
        $resultSet = $connexion->query($sql);
        $clients = $resultSet->fetchAll(PDO::FETCH_ASSOC);
    } catch (\PDOException $e){
        $errorMessage = $e->getMessage();
        $clients = [];
    }


    echo renderView('view-clients-list', [
        'pageTitle' => 'Liste des clients',
        'clients'   => $clients,
        'errorMessage' => $errorMessage
    ]);

    exit;
}

//Suppression d'un client
if($action == 'delete') {
    $sql = "DELETE FROM clients WHERE id_client=?";

    try {
        $statement = $connexion->prepare($sql);
        $statement->execute([$idClient]);
        header("location:/client");
    } catch (\PDOException $e){
        $errorMessage = $e->getMessage();
        echo renderView('view-error', [
            'pageTitle' => 'Erreur',
            'errorMessage' => $errorMessage
        ]);
    }
}

//Gestion du titre du formulaire en fonction de l'action
if($action == 'new'){
    $formTitle = "Nouveau client";
}else {
    $formTitle = "Modification de compte";
}

if($action == 'new' || $action == 'update') {

    //Récupération des données
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $dateNaissance = filter_input(INPUT_POST, 'dateNaissance', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
    $isPosted = filter_has_var(INPUT_POST, 'submit');

    //Traitement du formulaire posté
    if($isPosted){

        $idClient = filter_input(INPUT_POST, 'idClient', FILTER_VALIDATE_INT);

        $data = [
            'nom' => $nom,
            'prenom' => $prenom,
            'dateNaissance' => $dateNaissance,
            'email' => $email
        ];

        //Code sql différent en fonction de l'action (new ou update)
        if($action == 'new'){
            $sql = "INSERT INTO clients 
                    (nom, prenom, email, mot_de_passe, date_naissance) 
                    VALUES 
                    (UPPER(:nom), :prenom, :email, :motDePasse, :dateNaissance)";

            $data['motDePasse'] = $mdp;

        } else {
            $sql = "UPDATE clients SET 
                        nom = UPPER(:nom), 
                        prenom = :prenom, 
                        email = :email, 
                        date_naissance = :dateNaissance
                    WHERE id_client=:idClient";

            $data['idClient'] = $idClient;
        }

        try {
            $statement = $connexion->prepare($sql);
            $statement->execute($data);
            header("location:/client");
        }catch (\PDOException $e){
            $errorMessage = $e->getMessage();
        }

        //Si mise à jour (update) sur un formulaire non posté, il faut remplir les champs
        //avec les données du client à modifier
    } else if($action == 'update'){
        $sql = "SELECT * FROM clients WHERE id_client=?";

        try {
            $statement = $connexion->prepare($sql);
            $statement->execute([$idClient]);
            $client = $statement->fetch(PDO::FETCH_ASSOC);
        }catch (\PDOException $e){
            $errorMessage = $e->getMessage();
        }


        $nom = $client['nom'];
        $prenom = $client['prenom'];
        $email = $client['email'];
        $dateNaissance = $client['date_naissance'];
    }

    //Affichage du formulaire (update et new)
    echo renderView('view-client-form', [
        'pageTitle' => 'Ajout/modification de client',
        'formTitle' => $formTitle,
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'dateNaissance' => $dateNaissance,
        'mdp' => $mdp,
        'idClient' => $idClient,
        'action' => $action,
        'errorMessage' => $errorMessage
    ]);
}

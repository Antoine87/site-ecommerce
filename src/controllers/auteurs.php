<?php
$connexion = getPDO();

$action = filter_input(INPUT_GET, 'action');

$idAuteur = filter_input(INPUT_GET, 'idAuteur', FILTER_VALIDATE_INT);


if ($action == null) {
    $action = filter_input(INPUT_POST, 'action');
}

$errorMessage = "";
// affichage des auteurs
if ($action == null) {
    try {
        $sql = "SELECT * FROM auteurs";
        $resultSet = $connexion->query($sql);
        $rows = $resultSet->fetchAll(PDO::FETCH_OBJ);
        $resultSet = null;
        $nbRows = count($rows);
    } catch (\PDOException $exception) {
        echo $exception->getMessage();
        exit;
    }
    echo renderView('view-auteurs', [
        'pageTitle' => 'Auteurs',
        'rows' => $rows,
        //'errorMessage' => $errorMessage
    ]);

    exit;
}
//var_dump($action);


if ($action == 'delete') {
//DELETE
//Récupération du paramètre
    $idAuteur = filter_input(INPUT_GET, 'idAuteur', FILTER_VALIDATE_INT);
    try {
        //Chaîne de requête
        $sql = "DELETE FROM auteurs WHERE id_auteur=?";
        //Préparation de la requête
        $statement = $connexion->prepare($sql);
        //Exécution de la requête en passant les paramètres
        $statement->execute([$idAuteur]);

    } catch (\PDOException $e) {
        echo $e->getMessage();
    }

//Redirection vers l'accueil
    header("location:/auteurs");
}


if ($action == 'new') {
    $formTitle = "Nouvel auteur";
} else {
    $formTitle = "Modification";
}
if ($action == 'new' || $action == 'update') {

    //Récupération des données
    $nom_auteur = filter_input(INPUT_POST, 'nom_auteur', FILTER_SANITIZE_STRING);
    $prenom_auteur = filter_input(INPUT_POST, 'prenom_auteur', FILTER_SANITIZE_STRING);
    $biographie = filter_input(INPUT_POST, 'biographie', FILTER_SANITIZE_STRING);
    $isPosted = filter_has_var(INPUT_POST, 'submit');

    //Traitement du formulaire posté
    if ($isPosted) {

        //Validation des données
        $valid = !empty($nom_auteur) && !empty($prenom_auteur) && !empty($biographie);


        if ($valid) {

            $idAuteur = filter_input(INPUT_POST, 'idAuteur', FILTER_VALIDATE_INT);

            $data = [
                'nom_auteur' => $nom_auteur,
                'prenom_auteur' => $prenom_auteur,
                'biographie' => $biographie
            ];

            //Code sql différent en fonction de l'action (new ou update)
            if ($action == 'new') {
                $sql = "INSERT INTO auteurs 
                    (nom_auteur , prenom_auteur , biographie) 
                    VALUES 
                    (UPPER(:nom_auteur), :prenom_auteur, :biographie)";


            } else {
                $sql = "UPDATE auteurs SET 
                        nom_auteur  = UPPER(:nom_auteur), 
                        prenom_auteur  = :prenom_auteur, 
                        biographie = :biographie
                    WHERE id_auteur=:idAuteur";

                $data['idAuteur'] = $idAuteur;
            }

            try {
                $statement = $connexion->prepare($sql);
                $statement->execute($data);
                header("location:/auteurs");
            } catch (\PDOException $e) {
                $errorMessage = $e->getMessage();
            }
        } else {
            $errorMessage = "Votre saisie est invalide";
        }

        //Si mise à jour (update) sur un formulaire non posté, il faut remplir les champs
        //avec les données du client à modifier
    } else if ($action == 'update') {
        $sql = "SELECT * FROM auteurs WHERE id_auteur=?";

        try {
            $statement = $connexion->prepare($sql);
            $statement->execute([$idAuteur]);
            $auteur = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            $errorMessage = $e->getMessage();
        }


        $nom_auteur = $auteur['nom_auteur'];
        $prenom_auteur = $auteur['prenom_auteur'];
        $biographie = $auteur['biographie'];
    }

    //Affichage du formulaire (update et new)
    echo renderView('view-auteurs-form', [
        'pageTitle' => 'Ajout/modification',
        'nom_auteur' => $nom_auteur,
        'prenom_auteur' => $prenom_auteur,
        'biographie' => $biographie,
        'idAuteur' => $idAuteur,
        'action' => $action,
        'errorMessage' => $errorMessage,
        'formTitle' => $formTitle
    ]);
}
var_dump($action);

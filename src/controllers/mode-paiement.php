<?php

$isSubmited = filter_has_var(INPUT_POST,'submit');
$newModePaiement = filter_input(INPUT_POST,'newModePaiement',FILTER_SANITIZE_STRING);
$idModePaiement = filter_input(INPUT_POST,'idModePaiement',FILTER_VALIDATE_INT);
$delete = filter_input(INPUT_GET,'delete', FILTER_VALIDATE_INT);
$update = filter_input(INPUT_POST,"update",FILTER_SANITIZE_STRING);
$updateModePaiement = filter_input(INPUT_POST,"updateModePaiement",FILTER_SANITIZE_STRING);
$message = "";
/**
 * procedure d'ajout d'un nouveau paiement
 */
if ($isSubmited){

    $valide = !empty(trim($newModePaiement));

    if($valide) {

        try {
            $sql = "SELECT id_mode_de_paiement FROM modes_de_paiement WHERE mode_de_paiement=?";

            $connexion = getPDO();

            $statement = $connexion->prepare($sql);

            $statement->execute([$newModePaiement]);

            $valide = empty($statement->fetch(PDO::FETCH_ASSOC));

        }catch (\PDOException $exception){

            $message = "erreur de verification :".$exception->getMessage();

        }

        if ($valide) {

            try {

                $sql = "INSERT INTO modes_de_paiement(mode_de_paiement)VALUES(?)";

                $connexion = getPDO();

                $statement = $connexion->prepare($sql);

                $statement->execute([strtoupper($newModePaiement)]);

                $message = "ajout reussi";

            } catch (\PDOException $exception) {

                $message = "impossible d'inserer : ".$exception->getMessage();

            }
        }else{
            $message = "ce mode de paiement existe deja";
        }
    }
}

if ($delete){

    try {

        $sql = "DELETE FROM modes_de_paiement WHERE id_mode_de_paiement=?";

        $connexion = getPDO();

        $statement = $connexion->prepare($sql);

        $statement->execute([$delete]);

        $message = "suppression effectuée";

    }catch(\PDOException $exception){

        $message= "impossible d'effacer :".$exception->getMessage();

    }

}

if($update){

    $valide = !empty(trim($updateModePaiement));

    if ($valide) {

        try {
            $sql = "SELECT id_mode_de_paiement FROM modes_de_paiement WHERE mode_de_paiement=?";

            $connexion = getPDO();

            $statement = $connexion->prepare($sql);

            $statement->execute([$updateModePaiement]);

            $valide = empty($statement->fetch(PDO::FETCH_ASSOC));

        } catch (\PDOException $exception) {

            $message = "erreur de verification :" . $exception->getMessage();

        }

    }

    if($valide){

    $sql = "UPDATE modes_de_paiement SET mode_de_paiement=? WHERE id_mode_de_paiement=?";

    $connexion = getPDO();

    $statement = $connexion->prepare($sql);

    $statement->execute([$updateModePaiement, $idModePaiement]);

        $message="mise à jour ok";

}else{

        $message="le moyen de paiement existe déjà";
    }

};



    $sql = "SELECT * FROM modes_de_paiement";

    $connexion = getPDO();

    $statement = $connexion->prepare($sql);

    $statement->execute();

    $modePaiement=[];

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    array_push($modePaiement, $row);
};



echo renderView('view-mode-paiement',['modePaiement'=>$modePaiement,'message'=>$message]);
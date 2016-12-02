<?php

$isSubmited = filter_has_var(INPUT_POST,'submit');
$newModePaiement = filter_input(INPUT_POST,'newModePaiement',FILTER_SANITIZE_STRING);
$idModePaiement = filter_input(INPUT_POST,'idModePaiement',FILTER_VALIDATE_INT);
$delete = filter_input(INPUT_GET,'delete', FILTER_VALIDATE_INT);
$update = filter_input(INPUT_GET,"update",FILTER_VALIDATE_INT);

if ($isSubmited){

    $sql="INSERT INTO modes_de_paiement(mode_de_paiement)VALUES(?)";

    $connexion = getPDO();

    $statement = $connexion->prepare($sql);

    $statement->execute([$newModePaiement]);

}

if ($delete){

    $sql="DELETE FROM modes_de_paiement WHERE id_mode_de_paiement=?";

    $connexion = getPDO();

    $statement =$connexion->prepare($sql);

    $statement->execute([$delete]);

}

if($update){

    $sql ="UPDATE INTO modes_de_paiement SET(mode_de_paiement=?)";

    $connexion = getPDO();

    $statement =$connexion->prepare($sql);

    $statement->execute([$update]);

}


$sql = "SELECT * FROM modes_de_paiement";

$connexion = getPDO();

$statement = $connexion->prepare($sql);

$statement->execute();

$modePaiement=[];

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    array_push($modePaiement, $row);
};



echo renderView('view-mode-paiement',['modePaiement'=>$modePaiement]);
<?php


try {
    $sql = "SELECT * FROM editeurs";
    $resultSet = $connexion->query($sql);
    $rows = $resultSet->fetchAll(PDO::FETCH_OBJ);
    $resultSet = null;
    $nbRows = count($rows);
} catch (\PDOException $exception){
    echo $exception->getMessage();
    exit;
}



echo renderView('view-editeurs',[
    'pageTitle' => 'Editeurs'
]);
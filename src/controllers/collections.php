<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 12/3/2016
 * Time: 7:50 PM
 */

$operation = filter_input(INPUT_GET, 'operation');

if (empty($operation)) {
    $operation = filter_input(INPUT_POST, 'operation');
}

$connexion = getPDO();

if ($operation == null) {

    $sql = "SELECT
              collections.id_collection,
              collections.collection,
              editeurs.nom_editeur
            FROM
              collections
            INNER JOIN editeurs ON
              collections.id_editeur = editeurs.id_editeur
            ORDER BY collections.id_collection ASC";

    try {
        $resultSet = $connexion->query($sql);
        $items = $resultSet->fetchAll(PDO::FETCH_ASSOC);
    } catch (\PDOException $ex) {
        $errorMessage = $ex->getMessage();
    }
    echo renderView('view-collections-read', [
        'pageTitle' => 'Collections',
        'items' => $items
    ]);

} else if ($operation == 'insert' || $operation == 'update') {

    $editeurSelect = filter_input(INPUT_POST, 'editeurSelect', FILTER_SANITIZE_STRING);
    $collection = filter_input(INPUT_POST, 'collection', FILTER_SANITIZE_STRING);
    $idCollection = filter_input(INPUT_GET, 'idCollection', FILTER_VALIDATE_INT);

    if (empty($collection)) {
        $collection = filter_input(INPUT_GET, 'collection', FILTER_SANITIZE_STRING);
    }

    if (filter_has_var(INPUT_POST, 'submit')) {

        if ($operation == 'insert') {

            $sql = "INSERT INTO
                      collections (collection, id_editeur)
                    VALUES
                      (?, (SELECT id_editeur FROM editeurs WHERE nom_editeur = ?))";

            try {
                $statement = $connexion->prepare($sql);
                $statement->execute([$collection, $editeurSelect]);
            } catch (\PDOException $ex) {
                $errorMessage = $ex->getMessage();
            }
            header("location:/collections");

        } else if ($operation == 'update') {

            $idCollection = filter_input(INPUT_POST, 'idCollection', FILTER_VALIDATE_INT);

            $sql = "UPDATE
                      collections
                    SET
                      collection = ?,
                      id_editeur = (SELECT id_editeur FROM editeurs WHERE nom_editeur = ?)
                    WHERE
                      collections.id_collection = ?";

            try {
                $statement = $connexion->prepare($sql);
                $statement->execute([$collection, $editeurSelect, $idCollection]);
            } catch (\PDOException $ex) {
                $errorMessage = $ex->getMessage();
            }
            header("location:/collections");
        }
    }
    $sql = "SELECT nom_editeur FROM editeurs";

    try {
        $resultSet = $connexion->query($sql);
        $items = $resultSet->fetchAll(PDO::FETCH_ASSOC);
    } catch (\PDOException $ex) {
        $errorMessage = $ex->getMessage();
    }
    echo renderView('view-collections-update', [
        'pageTitle' => 'Collections',
        'headerTitle' => 'Ajout d\'une collection',
        'items' => $items,
        'operation' => $operation,
        'collection' => $collection,
        'idCollection' => $idCollection
    ]);


} else if ($operation == 'delete') {

    $idCollection = filter_input(INPUT_GET, 'idCollection', FILTER_VALIDATE_INT);

    if (!empty($idCollection)) {

        $sql = "DELETE FROM collections WHERE id_collection = ?";

        try {
            $statement = $connexion->prepare($sql);
            $statement->execute([$idCollection]);
            $items = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            $errorMessage = $ex->getMessage();
        }
    }
    header("location:/collections");
}


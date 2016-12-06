<div class="alert alert-danger" role="alert">
    <h1>Mode de livraison</h1>
</div>

<?php


$connexion = getPDO();
/*
$sql = "INSERT INTO clients
(description_mode_livraison, tarif_livraison, delais_livraison, mot_de_passe, date_naissance)
VALUES (:description_mode_livraison, :tarif_livraison, :delais_livraison, :motDePasse, :dateNaissance)";

$statement = $connexion->prepare($sql);

$statement->execute([
'description_mode_livraison' => 'Ricard',
'tarif_livraison' => 'Paul',
'delais_livraison' => 'ricard@mail.com',
'motDePasse' => sha1('123'),
'dateNaissance' => '1942-11-20'
]);

$statement->execute([
'description_mode_livraison' => 'Atreides',
'tarif_livraison' => 'Paul',
'delais_livraison' => 'patreides@mail.com',
'motDePasse' => sha1('123'),
'dateNaissance' => '1910-11-20'
]);
*/

try {
    $sql = "SELECT * FROM modes_livraison";
    $resultSet = $connexion->query($sql);
    $rows = $resultSet->fetchAll(PDO::FETCH_OBJ);
    $resultSet = null;
    $nbRows = count($rows);
} catch (\PDOException $exception){
    echo $exception->getMessage();
    exit;
}


?>

<table>

    <tr>
        <th>Description mode livraison</th>
        <th>Tarif Livraison</th>
        <th>Delais livraison</th>


    </tr>

    <?php foreach ($rows as $mode_livraison): ?>
    <tr>
        <td><?=$mode_livraison->description_mode_livraison?></td>
        <td><?=$mode_livraison->tarif_livraison?></td>
        <td><?=$mode_livraison->delais_livraison?></td>

        <td>
            <a href="delete.php?idLivraison=<?=$mode_livraison->id_mode_livraison?>">
                Supprimer
            </a> |
            <a href="update.php?idLivraison=<?=$mode_livraison->id_mode_livraison?>">
                Modifier
            </a>

        </td>
    </tr>
    <?php endforeach; ?>

    <a href="href="/livraison"?idLivraison=<?=$mode_livraison->id_mode_livraison?>">
        Insert

</table>

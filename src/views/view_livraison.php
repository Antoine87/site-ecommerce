<div class="alert alert-danger" role="alert">
    <h1>Mode de livraison</h1>
</div>

<?php


$connexion = getPDO();
/*
$sql = "INSERT INTO clients
(nom, prenom, email, mot_de_passe, date_naissance)
VALUES (:nom, :prenom, :email, :motDePasse, :dateNaissance)";

$statement = $connexion->prepare($sql);

$statement->execute([
'nom' => 'Ricard',
'prenom' => 'Paul',
'email' => 'ricard@mail.com',
'motDePasse' => sha1('123'),
'dateNaissance' => '1942-11-20'
]);

$statement->execute([
'nom' => 'Atreides',
'prenom' => 'Paul',
'email' => 'patreides@mail.com',
'motDePasse' => sha1('123'),
'dateNaissance' => '1910-11-20'
]);
*/

try {
$sql = "SELECT * FROM clients";
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
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Date de naissance</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($rows as $client): ?>
        <tr>
            <td><?=$client->nom?></td>
            <td><?=$client->prenom?></td>
            <td><?=$client->email?></td>
            <td><?=$client->date_naissance?></td>
            <td>
                <a href="delete.php?idClient=<?=$client->id_client?>">
                    Supprimer
                </a> |
                <a href="update.php?idClient=<?=$client->id_client?>">
                    Modifier
                </a>

            </td>
        </tr>
    <?php endforeach; ?>

    <a href="insert.php?idClient=<?=$client->id_client?>">
        Insert

</table>




<div>
    <a href="/client/add-edit"
       class="btn btn-sm btn-primary">
        Ajouter
    </a>
</div>

<table class="table table-striped table-bordered">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>e-mail</th>
        <th>date de naissance</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($data as $client): ?>
        <tr>
            <td><?= $client['nom']?></td>
            <td><?= $client['prenom']?></td>
            <td><?= $client['email']?></td>
            <td><?= $client['date_naissance']?></td>
            <td>
                <a href="/client/delete/<?=$client["id_client"]?>"
                        class="btn btn-sm btn-primary">
                    Supprimer
                </a>

                <a href="/client/add-edit/<?=$client["id_client"]?>"
                   class="btn btn-sm btn-primary">
                    Modifier
                </a>

            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php

?>
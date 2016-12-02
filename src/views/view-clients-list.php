<div class="col-md-9">
    <h1>Liste des clients</h1>
</div>


<div class="col-md-3">
    <a      class="btn btn-primary btn-block"
            href="/client?action=new" type="button">
        Ajouter un client
    </a>
</div>


<table class="table table-bordered table-striped table-responsive">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>email</th>
            <th>Date de naissance</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?=$client['nom']?></td>
            <td><?=$client['prenom']?></td>
            <td><?=$client['email']?></td>
            <td><?=$client['date_naissance']?></td>
            <td>
                <a class="btn btn-primary btn-sm"
                        href="/client?action=delete&idClient=<?=$client['id_client']?>"
                        type="button">
                    Supprimer
                </a>
                <a class="btn btn-primary btn-sm"
                        href="/client?action=update&idClient=<?=$client['id_client']?>"
                        type="button">
                    Modifier
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
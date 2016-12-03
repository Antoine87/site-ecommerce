<div class="page-header">
    <h1>Liste des collections</h1>
</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Collections</th>
        <th>Editeurs</th>
        <th>Opérations</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item['collection'] ?></td>
            <td><?= $item['nom_editeur'] ?></td>
            <td>
                <a class="btn btn-primary" type="button"
                   href="/collections?operation=delete&idCollection=<?= $item['id_collection'] ?>">Supprimer</a>
                <a class="btn btn-primary" type="button"
                   href="/collections?operation=update&idCollection=<?= $item['id_collection'] ?>&collection=<?= $item['collection'] ?>">Modifier</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="col-md-3">
    <a class="btn btn-primary" href="/collections?operation=insert" type="button">Ajouter une collection</a>
</div>

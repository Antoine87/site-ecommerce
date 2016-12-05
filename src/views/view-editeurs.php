<a href="editeurs?action=insert">Insérer un éditeur</a>
<table class="table col-md-1 table-striped table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nom de l'éditeur</td>
        <td>Actions</td>
    </tr>
    </thead>
    <?php foreach ($rows as $editeur): ?>
        <tr>
            <td><?= $editeur->id_editeur ?></td>
            <td><?= $editeur->nom_editeur ?></td>
            <td>
                <a href="editeurs?action=delete&id_editeur=<?= $editeur->id_editeur ?>">
                    <span class="glyphicon glyphicon-trash"></span>
                </a> |
                <a href="editeurs?action=update&id_editeur=<?= $editeur->id_editeur ?>&nom_editeur=<?= $editeur->nom_editeur ?>">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
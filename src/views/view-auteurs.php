<div class="col-md-9">
    <h1>Liste des auteurs</h1>
</div>


<div class="col-md-3">
    <a      class="btn btn-primary btn-block"
            href="/auteurs?action=new" type="button" >
        Ajouter un auteur
    </a>
</div>


<table class="table table-bordered table-striped table-responsive">

    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Biographie</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($rows as $auteur): ?>
        <tr>
            <td><?=$auteur->nom_auteur?></td>
            <td><?=$auteur->prenom_auteur?></td>
            <td><?=$auteur->biographie?></td>
            <td>
                <a href="/auteurs?action=delete&idAuteur=<?=$auteur->id_auteur?>" class="glyphicon glyphicon-trash">

                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/auteurs?action=update&idAuteur=<?=$auteur->id_auteur?>" class="glyphicon glyphicon-pencil">

                </a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
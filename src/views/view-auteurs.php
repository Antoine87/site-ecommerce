<div class="col-md-9">
    <h1>Liste des auteurs</h1>
</div>


<div class="pull-right">

    <a class="btn btn-info  btn-lg btn-block" href="/auteurs?action=new" type="button" >
        Ajouter un auteur
    </a>
</div>

<div>
<table class="table table-bordered table-striped table-responsive">

    <tr >
        <th class="text-center">Prénom</th>
        <th class="text-center">Nom</th>
        <th class="text-center">Biographie</th>
        <th class="text-center">Actions</th>
    </tr>

    <?php foreach ($rows as $auteur): ?>
        <tr>
            <td width=15% class="text-center"><?=$auteur->prenom_auteur?></td>
            <td width=15% class="text-center"><?=$auteur->nom_auteur?></td>
            <td width=55%><?=$auteur->biographie?></td>
            <td width=15% class="text-center">
                <a href="/auteurs?action=update&idAuteur=<?=$auteur->id_auteur?>" class="glyphicon glyphicon-pencil"></a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <a href="/auteurs?action=delete&idAuteur=<?=$auteur->id_auteur?>" class="glyphicon glyphicon-trash"></a>

            </td>
        </tr>
    <?php endforeach; ?>

</table>

</div>
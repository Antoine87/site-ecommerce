<div class="col-md-6 col-md-offset-3">


    <div class="alert-danger">
        <?=$errorMessage?>
    </div>

    <h2><?=$formTitle?></h2>
    <form method="post" action="/auteurs">
        <div class="form-group">
            <label>Nom :
            <input type="text" class="form-control" name="nom_auteur"  value="<?= $nom_auteur ?>">
            </label>
        </div>

        <div class="form-group">
            <label>Prénom :
            <input type="text" class="form-control" name="prenom_auteur"  value="<?= $prenom_auteur ?>">
            </label>
        </div>

        <div class="form-group">
            <label >Biographie :</label>
            <textarea class="form-control" name="biographie"><?= $biographie ?></textarea>

        </div>


        <input type="hidden" name="idAuteur" value="<?= $idAuteur ?>">

        <input type="hidden" name="action" value="<?= $action ?>">

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" name="submit">Valider</button>
        </div>
    </form>
</div>
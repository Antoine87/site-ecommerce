<div class="col-md-6 col-md-offset-3">

    <div class="alert-danger">
        <?=$errorMessage?>
    </div>

    <h2><?=$formTitle?></h2>
    <form method="post" action="/client">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" value="<?= $nom ?>">
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $prenom ?>">
        </div>

        <div class="form-group">
            <label for="email">adresse e-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>">
        </div>

        <div class="form-group">
            <label for="dateNaissance">date de naissance</label>
            <input type="date" class="form-control" name="dateNaissance" id="dateNaissance"
                   value="<?= $dateNaissance ?>">
        </div>

        <?php if ($action == 'new'): ?>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp">
            </div>
        <?php endif; ?>

        <input type="hidden" name="idClient" value="<?= $idClient ?>">

        <input type="hidden" name="action" value="<?= $action ?>">

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" name="submit">Valider</button>
        </div>
    </form>
</div>
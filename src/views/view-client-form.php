

<div class="col-md-6 col-md-offset-3">

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?=$_SESSION['error']?>
        </div>
    <?php endif; ?>

    <form action="<?=$action?>" method="post" class="form">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?=$client->getNom()?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?=$client->getPrenom()?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">e-mail</label>
            <input type="email" name="email" id="email" value="<?=$client->getEmail()?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="dateNaissance">Date de naissance</label>
            <input type="date" name="dateNaissance" id="dateNaissance" value="<?=$client->getDateNaissance()?>" class="form-control">
        </div>

        <?php if($client->getId() == null): ?>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirmation du mot de passe</label>
                <input type="password" name="passwordConfirm" id="password-confirm" class="form-control">
            </div>
        <?php endif;?>

        <div class="form-group">
            <button type="submit" name="submit" class="form-control btn btn-primary">Valider</button>
        </div>
    </form>
</div>
<div class="col-md-12">
    <h2>Catalogue</h2>



    <?php foreach ($catalogue as $livre): ?>
        <div class="catalogue-item col-md-12">
            <div class="col-md-8">
                <h4><?=$livre["titre"]?></h4>
                <p>par <?=$livre["liste_auteurs"]?></p>
                <p>
                    édité par <?=$livre["nom_editeur"]?>
                    version <?=$livre["nom_langue"]?>

                </p>
            </div>
            <div class="col-md-4">
                <h5><?=$livre["prix"]?> €</h5>
                <a href="/catalogue/ajout-panier/<?=$livre["id_livre"]?>"
                class="btn btn-sm btn-primary">
                    ajouter au panier
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

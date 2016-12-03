<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="page-header">
                <h1><?= $headerTitle ?></h1>
            </div>

            <form method="post" action="/collections">
                <div class="form-group">
                    <label for="collection">Collection</label>
                    <input type="text" class="form-control" name="collection" id="collection"
                           value="<?= $collection ?>">
                </div>

                <div class="form-group">
                    <label for="editeur">Editeur</label>
                    <select class="form-control" name="editeurSelect">
                        <?php foreach ($items as $item): ?>
                            <option><?= $item['nom_editeur'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="hidden" name="idCollection" value="<?= $idCollection ?>">
                <input type="hidden" name="operation" value="<?= $operation ?>">

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

<form method="post" action="/panier/recalculer">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Prix unitaire</th>
            <th>qt</th>
            <th>Total</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $total = 0;
        foreach ($panier as $pk => $livre):
            ?>
            <tr>
                <td><?= $livre["titre"] ?></td>
                <td><?= $livre["prix"] ?></td>
                <td>
                    <input type="number" class="form-control"
                           name="qt[<?= $pk ?>]" value="<?= $livre["qt"] ?>">
                </td>
                <td><?= $livre["prix"] * $livre["qt"] ?></td>
            </tr>
            <?php
            $total += $livre["prix"] * $livre["qt"];
        endforeach;
        ?>
        <tr>
            <td colspan="3" class="text-right">TOTAL</td>
            <td><?= $total ?></td>
        </tr>
        </tbody>
    </table>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" name="submit">
            Recalculer le panier
        </button>

        <a class="btn btn-primary" href="/panier/vider">Vider le panier</a>
    </div>
</form>
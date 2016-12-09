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
            $total =0;
            foreach ($panier as $pk => $livre):
                ?>
            <tr>
                <td><?= $livre["titre"]?></td>
                <td><?= $livre["prix"]?></td>
                <td><?= $livre["qt"]?></td>
                <td><?= $livre["prix"] * $livre["qt"]?></td>
            </tr>
        <?php
            $total += $livre["prix"] * $livre["qt"];
            endforeach;
        ?>
        <tr>
            <td colspan="3" class="text-right">TOTAL</td>
            <td><?=$total?></td>
        </tr>
    </tbody>
</table>
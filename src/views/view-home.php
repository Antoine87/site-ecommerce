
<table>
    <tr>
        <th>Langue</th>
    </tr>
    <?php foreach ($data as $langue): ?>
        <tr>
            <td><?= $langue['nom_langue']?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php

?>
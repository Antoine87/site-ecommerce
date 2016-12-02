<h2 class="text-center">mode de paiement</h2>

<div class="well col-md-offset-1 col-md-4">

   <table class="table">
       <thead>
<tr>
    <td>mode de paiement</td>
</tr>

       </thead>
       <tbody>
<?php foreach ($modePaiement as $mode):?>
<tr>
    <td class="col-md-6"><?=$mode['mode_de_paiement']?></td>
    <td >
        <a href="/mode-paiement?delete=<?=$mode['id_mode_de_paiement']?>" class="glyphicon glyphicon-remove-circle"></a>
        <a href="/mode-paiement?update=<?=$mode['id_mode_de_paiement']?>" class="glyphicon glyphicon-pencil"></a>
    </td>
</tr>

<? endforeach;?>

       </tbody>
   </table>


</div>

<div class="well col-md-offset-2 col-md-4">

    <form class="form-horizontal" method="post" action="index.php?page=mode-paiement">
        <div class="form-group">
        <label class="control-label" for="modePaiement">entrer un nouveau mode de paiement</label>
        <input class="form-control" type="text" id="modePaiement" name="newModePaiement" value="">
        </div>

        <button class="btn btn-default" type="submit" name="submit" value="submit" >entrer</button>
    </form>


</div>
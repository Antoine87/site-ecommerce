<form method="post" action="editeurs">
    <label>Editeur à modifier
        <input type="text" name="nom_editeur" value="<?=$nom_editeur?>">
    </label><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <button type="submit" name="submit">Valider</button>
</form>
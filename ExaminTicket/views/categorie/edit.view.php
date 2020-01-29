
<h4 class="title"><span class="text"><strong>Modifier </strong> categorie </span></h4>

<form method="post" class="form-actions"  action="index.php?controller=categorie&action=edit" enctype="multipart/form-data">

    <input type="hidden" name="id_categorie" value="<?php echo $res->id_categorie;?>">
    nom <br><input type="text" name="nom" value="<?php echo $res->nom;?>">
    <br><input type="submit" class="btn-primary btn" value="Modifier categorie">
    <input type="reset" class="btn-primary btn" value="annuler">
</form>


<h4 class="title"><span class="text"><strong>Modifier </strong> Type </span></h4>

<form method="post" action="index.php?controller=type&action=edit" enctype="multipart/form-data">
<input type="hidden" name="id_type" value="<?php echo $res->id_type;?>">
    <label>nom </label> <input type="text" name="nom" value="<?php echo $res->nom;?>">
    <label>prix unitaire </label> <input type="text" name="prixu" value="<?php echo $res->prixu;?>">
<br> <label>quantité </label> <input type="text" name="qte" value="<?php echo $res->qte;?>">
<br><input type="submit"  class="btn btn-primary" value="Modifier type">
<input type="reset" class="btn btn-primary" value="annuler">
</form>

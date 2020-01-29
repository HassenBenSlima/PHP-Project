<form  method="post" 
    action="index.php?controllers=marque&action=edit" 
    enctype= "multipart/form-data"> 

<label>id_marque</label><br>  

        <input type="texte" name="id_marque" value="<?php $res->id_marque ?>" class="form-control" \>
<label>design_marque</label><br>  

        <input type="texte" name="design_marque" value="<?php $res->design_marque ?>" class="form-control" \>
<input type="submit" class="btn  btn-3d btn-success" value="Modifier"/> 
 
</form>
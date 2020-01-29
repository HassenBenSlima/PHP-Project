<form  method="post" 
    action="index.php?controllers=voitures&action=edit" 
    enctype= "multipart/form-data"> 

<label>id_voit</label><br>  

        <input type="texte" name="id_voit" value="<?php $res->id_voit ?>" class="form-control" \>
<label>nom_voit</label><br>  

        <input type="texte" name="nom_voit" value="<?php $res->nom_voit ?>" class="form-control" \>
<label>photo_voit</label><br>  

        <input type="texte" name="photo_voit" value="<?php $res->photo_voit ?>" class="form-control" \>
<label>marque_voit</label><br>  

        <input type="texte" name="marque_voit" value="<?php $res->marque_voit ?>" class="form-control" \>
<label>couleur_voit</label><br>  

        <input type="texte" name="couleur_voit" value="<?php $res->couleur_voit ?>" class="form-control" \>
<input type="submit" class="btn  btn-3d btn-success" value="Modifier"/> 
 
</form>
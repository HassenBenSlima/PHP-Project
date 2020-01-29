<form  method="post" 
    action="index.php?controllers=reservations&action=edit" 
    enctype= "multipart/form-data"> 

<label>id_reserv</label><br>  

        <input type="texte" name="id_reserv" value="<?php $res->id_reserv ?>" class="form-control" \>
<label>date_debut</label><br>  

        <input type="texte" name="date_debut" value="<?php $res->date_debut ?>" class="form-control" \>
<label>date_fin</label><br>  

        <input type="texte" name="date_fin" value="<?php $res->date_fin ?>" class="form-control" \>
<label>prix_reserv</label><br>  

        <input type="texte" name="prix_reserv" value="<?php $res->prix_reserv ?>" class="form-control" \>
<label>nom_clt</label><br>  

        <input type="texte" name="nom_clt" value="<?php $res->nom_clt ?>" class="form-control" \>
<label>prenom_clt</label><br>  

        <input type="texte" name="prenom_clt" value="<?php $res->prenom_clt ?>" class="form-control" \>
<label>cin_clt</label><br>  

        <input type="texte" name="cin_clt" value="<?php $res->cin_clt ?>" class="form-control" \>
<label>id_voit</label><br>  

        <input type="texte" name="id_voit" value="<?php $res->id_voit ?>" class="form-control" \>
<input type="submit" class="btn  btn-3d btn-success" value="Modifier"/> 
 
</form>
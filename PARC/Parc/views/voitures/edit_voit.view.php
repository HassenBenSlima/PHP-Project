<form method="post" action="index.php?controller=voitures&action=edit_voit" enctype="multipart/form-data">
<h1>Modifier voiture</h1>
<br><img src="files/<?php echo $res->photo_voit;?>" width="70"><br>
<input type="hidden" name="id_voit" value="<?php echo $res->id_voit;?>">
<br>nom voiture <input type="text" name="nom_voit" value="<?php echo $res->nom_voit;?>">
<br>photo voiture <input type="file" name="photo_voit">
<br>marque voiture <input type="text" name="marque_voit" value="<?php echo $res->marque_voit;?>">
<br>couleur voiture <input type="text" name="couleur_voit" value="<?php echo $res->couleur_voit;?>">
<input type="hidden" name="modif" value="<?php echo $res->photo_voit;?>">
<br><input type="submit" value="Modifier voiture">
<input type="reset" value="annuler">
</form>
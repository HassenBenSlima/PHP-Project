<form method="post" action="index.php?controller=marque&action=edit_marque">
<h1>Modifier voiture</h1>
<input type="hidden" name="id_marque" value="<?php echo $res->id_marque;?>">
<br>nom marque <input type="text" name="design_marque" value="<?php echo $res->design_marque;?>">
<br><input type="submit" value="Modifier marque">
<input type="reset" value="annuler">
</form>
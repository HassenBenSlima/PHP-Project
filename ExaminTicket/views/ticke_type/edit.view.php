<form method="post" action="index.php?controller=ticke_type&action=edit" enctype="multipart/form-data">
<h1>Modifierticke_type</h1>
<br>id <input type="text" name="id" value="<?php echo $res->id;?>">
<br>id_ticket <input type="text" name="id_ticket" value="<?php echo $res->id_ticket;?>">
<br>id_type <input type="text" name="id_type" value="<?php echo $res->id_type;?>">
<br>qte <input type="text" name="qte" value="<?php echo $res->qte;?>">
<br><input type="submit" value="Modifier ticke_type">
<input type="reset" value="annuler">
</form>

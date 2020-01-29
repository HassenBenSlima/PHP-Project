<form method="post" action="index.php?controller=reservation&action=edit" enctype="multipart/form-data">
<h1>Modifierreservation</h1>
<br>id_cmd <input type="text" name="id_cmd" value="<?php echo $res->id_cmd;?>">
<br>date <input type="text" name="date" value="<?php echo $res->date;?>">
<br>id_client <input type="text" name="id_client" value="<?php echo $res->id_client;?>">
<br><input type="submit" value="Modifier reservation">
<input type="reset" value="annuler">
</form>

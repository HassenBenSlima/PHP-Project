<form method="post" action="index.php?controller=ligne_cmd&action=edit" enctype="multipart/form-data">
<h1>Modifierligne_cmd</h1>
<br>id <input type="text" name="id" value="<?php echo $res->id;?>">
<br>qte <input type="text" name="qte" value="<?php echo $res->qte;?>">
<br>id_cmd <input type="text" name="id_cmd" value="<?php echo $res->id_cmd;?>">
<br>id_ticket <input type="text" name="id_ticket" value="<?php echo $res->id_ticket;?>">
<br>prixu <input type="text" name="prixu" value="<?php echo $res->prixu;?>">
<br><input type="submit" value="Modifier ligne_cmd">
<input type="reset" value="annuler">
</form>

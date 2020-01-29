<h4 class="title"><span class="text"><strong>Modifier </strong> admin </span></h4>

<form  class="form-actions center" method="post" action="index.php?controller=admin&action=edit" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $res->id;?>">
<input type="hidden" name="login" value="<?php echo $res->login;?>">
<input type="hidden" name="pass" value="<?php echo $res->pass;?>">
nom <br><input type="text" name="nom" class="input-medium" value="<?php echo $res->nom;?>"><br>
<input type="submit" class="btn btn-primary" value="Modifier admin">
<input type="reset" class="btn btn-primary" value="annuler">
</form>

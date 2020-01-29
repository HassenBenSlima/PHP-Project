<form  method="post" 
    action="index.php?controllers=admin&action=edit" 
    enctype= "multipart/form-data"> 

<label>login</label><br>  

        <input type="texte" name="login" value="<?php $res->login ?>" class="form-control" \>
<label>pass</label><br>  

        <input type="texte" name="pass" value="<?php $res->pass ?>" class="form-control" \>
<input type="submit" class="btn  btn-3d btn-success" value="Modifier"/> 
 
</form>



<div class="span7">
    <h4 class="title"><span class="text"><strong>modifier </strong> client </span></h4>
    <form action="index.php?controller=client&action=edit" method="post" class="form-stacked" enctype="multipart/form-data">
        <fieldset>
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <input type="hidden" name="id_client" value="<?php echo $res->id_client;?>">                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nom:</label>
                <div class="controls">
                    <input type="text" name="nom" value="<?php echo $res->nom;?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Prenom:</label>
                <div class="controls">
                    <input type="text" name="prenom" value="<?php echo $res->prenom;?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <input type="hidden" name="email" value="<?php echo $res->email;?>">
                </div>

            </div>
            <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <input type="hidden" name="motDePasse" value="<?php echo $res->motDePasse;?>">
                    </div>
            </div>
                    <div class="control-group">
                        <label class="control-label"> contact</label>
                        <div class="controls">
                            <input type="text" name="contact" value="<?php echo $res->contact;?>">
                        </div>
                    </div>
            <hr>
            <div class="actions center"><input tabindex="9" class="btn btn-primary " type="submit" value="modifier">

            <input type="reset" class="btn  btn-primary" value="annuler">
            </div>
                </div>

</fieldset>
    </form>

</div>

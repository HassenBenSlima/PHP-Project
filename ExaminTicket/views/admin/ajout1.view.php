


<div >
    <h4 class="title"><span class="text"><strong>Ajouter </strong> admin </span></h4>
    <form method="post" action="index.php?controller=admin&action=ajout"  class="form-stacked" enctype="multipart/form-data">
        <fieldset>
            <div class="control-group">
                <label class="control-label">identifiant </label>
                <div class="controls">
                    <input type="text" name="login">           </div>
            </div>
            <div class="control-group">
                <label class="control-label">mot de passe</label>
                <div class="controls">
                     <input type="text" name="pass">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">nom</label>
                <div class="controls">
                   <input type="text" name="nom">
                </div>
            </div>


            <hr>
            <div class="actions center"><input tabindex="9" class="btn btn-primary " type="submit" value="ajouter">

                <input type="reset" class="btn  btn-primary" value="annuler">
            </div>
        </fieldset>
    </form>

</div>

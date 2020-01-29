    <h4 class="title"><span class="text"><strong>Ajouter </strong> ticket </span></h4>
    <form method="post" action="index.php?controller=ticket&action=ajout"  class="form-stacked" enctype="multipart/form-data">
        <fieldset>
            <div class="control-group">
                <label class="control-label">nom</label>
                <div class="controls">
                   <input type="text" name="nom">
            </div>

            <div class="control-group">
                <label class="control-label">Categorie:</label>
                <div class="controls">

                    <select name="id_categorie" class="form-control">
                        <?php
                        foreach($catt as $obj){
                            echo "<option value=".$obj->id_categorie.">".$obj->nom."</options>";
                        }
                        ?>

                    </select>


                </div>
            </div>
            <div class="control-group">
                <label class="control-label">type de ticket :</label>
                <div class="controls">

                    <select name="ary[]"  class="form-control" size="3" multiple="multiple" >
                        <?php
                        foreach($typp as $obj){
                            echo "<option value=".$obj->id_type.">".$obj->nom."</options>";
                        }
                        ?>
                    </select>


                </div>

            </div>
            <div class="control-group">
                <label class="control-label">date</label>
                <div class="controls">
                    <input type="date" name="date">
                </div>
            </div>
            <div class="control-group">
                    <label class="control-label"> place</label>
                    <div class="controls">
                        <input type="text" name="place">
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">ville</label>
                    <div class="controls">
                        <input type="text" name="ville">
                    </div>
                </div>
                <hr>
                <div class="control-group">
                    <label class="control-label"> photo</label>
                    <div class="controls">
                        <input type="file" name="photo">
                    </div>
                </div>
                <hr>
                <div class="control-group">
                    <label class="control-label">description:</label>
                    <div class="controls">

                      <textarea  rows="10"  type="text" name="description"  class="form-control">
                      </textarea>

                    </div>
                </div>
            <hr>
            <div class="actions center"><input tabindex="9" class="btn btn-primary " type="submit" value="ajouter">

                <input type="reset" class="btn  btn-primary" value="annuler">
            </div>
</div>

</fieldset>
</form>












<





<!--    <input type="text" name="id_categorie" value="--><?php //echo $res->id_categorie;?><!--">-->



<h4 class="title"><span class="text"><strong>Modifier </strong> ticket </span></h4>
<form method="post" action="index.php?controller=ticket&action=edit"  class="form-stacked" enctype="multipart/form-data">
    <fieldset>
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <input type="hidden" name="id_ticket" value="<?php echo $res->id_ticket;?>">
            </div>

            <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                    <br><img src="files/<?php echo $res->photo;?>" width="150"><br>
                </div>


            <div class="control-group">
                <label class="control-label">categorie</label>
                <div class="controls">

                    <select name="id_categorie" class="form-control">
                        <?php
                        foreach($catt as $obj){
                            echo "<option value=".$obj->id_categorie.">".$obj->nom."</options>";
                            if($obj->id_categorie==$res->id_categorie){
                                echo "<option value=".$obj->id_categorie." selected >".$obj->nom."</options>";

                            }
                        }
                        ?>

                    </select>


                </div>
            </div>
            <div class="control-group">
                <label class="control-label">nom</label>
               <input type="text" name="nom" value="<?php echo $res->nom;?>">

                </div>

            </div>
            <div class="control-group">
                <label class="control-label">date</label>
                <div class="controls">
                 <input type="date" name="date" value="<?php echo $res->date;?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"> place</label>
                <div class="controls">
                <input type="text" name="place" value="<?php echo $res->place;?>">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label">ville</label>
                <div class="controls">
                    <input type="text" name="ville" value="<?php echo $res->ville;?>">
                </div>
            </div>
            <hr>
            <div class="control-group">
                <label class="control-label"> photo</label>
                <input type="hidden" name="modif" value="<?php echo $res->photo;?>">
                <div class="controls">
                    <input type="file" name="photo" value="<?php echo $res->photo;?>">
                </div>
            </div>
            <hr>
            <div class="control-group">
                <label class="control-label">description:</label>
                <div class="controls">

                      <textarea  rows="10"  type="text" name="description"  class="form-control">

                          <?php echo $res->description;?>




                      </textarea>

                </div>
            </div>
            <hr>
            <div class="actions center"><input tabindex="9" class="btn btn-primary " type="submit" value="modifer">

                <input type="reset" class="btn  btn-primary" value="annuler">
            </div>
        </div>

    </fieldset>
</form>


















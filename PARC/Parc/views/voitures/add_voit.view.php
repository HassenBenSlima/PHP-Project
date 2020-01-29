<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ajouter voiture</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="index.php?controller=voitures&action=add_voit" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nom  voiture</label>
                                                <input type="text" name="nom_voit" class="form-control" placeholder="Nom voiture" >
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>photo  voiture</label>
                                                <input type="text" name="photo_voit" class="form-control" placeholder="Nom voiture" >
                                            </div>
                                        </div>
                                    </div>

									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>marque  voiture</label>
                                            <select name="marque_voit" class="form-control">
<?php
foreach($res as $obj){
	echo "<option value=".$obj->id_marque.">".$obj->design_marque."</options>";
}
?>

</select>
											</div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>couleur  voiture</label>
                                                <input type="text" name="couleur_voit" class="form-control" placeholder="Nom voiture" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    </div>

                                    
                                    <button type="submit" class="btn btn-info btn-fill pull-right" style="margin:10px">Ajouter voiture</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Liste des voitures</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Photo</th>
                                    	<th>Nom voiture</th>
                                    	<th>marque voiture</th>
                                    	<th>Couleur</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
foreach($res as $obj){
?>
<tr>
	<td><?php if(!empty($obj->photo_voit)) { ?><img src="files/<?php echo $obj->photo_voit;?>" width="100"><?php } ?></td>
	<td><?php echo $obj->nom_voit;?></td>
	<td><?php echo $obj->design_marque;?></td>
	<td><?php echo $obj->couleur_voit;?></td>
	<td><a href="index.php?controller=voitures&action=delete_voit&photo_voit=<?php echo $obj->photo_voit;?>&id_voit=<?php echo $obj->id_voit;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supp.</a> 
	| <a href="index.php?controller=voitures&action=edit1&id_voit=<?php echo $obj->id_voit;?>">modif.</td>
</tr>
<?php
}
?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
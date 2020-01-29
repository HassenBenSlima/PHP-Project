<table id="example1" class="table table-bordered table-striped">
 <thead>
<tr>
	<th>nomticket</th>
    <th>photo</th>
    <th>quantite</th>
	<th>prix unitaire</th>
	<th>client</th>
	<th>Prix Total</th>
	<th>action</th> 
</tr>
</thead>
<tbody>
<?php
foreach($res as $obj){
?>
<tr>
	<td><?php echo $obj->nomticket;?></td>
    <td><?php if (!empty ($obj->photo)) { ?><img src="files/<?php echo $obj->photo;?>" width="150"><?php } ?></td>
	<td><?php echo $obj->quantite;?></td>
	<td><?php echo $obj->prix;?></td>
	<td><?php echo $obj->nomclient;?></td>
	<td><?php echo ($obj->prix * $obj->quantite);?></td>
<td><a href="index.php?controller=ligne_cmd&action=delete&id=<?php echo $obj->id;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supp.</a>
</td></tr>
<!--    | <a href="index.php?controller=ligne_cmd&action=edit1&id=--><?php //echo $obj->id;?><!--">modif.</a>-->
    <?php
}
?>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</tbody>
</table>


<h4 class="title"><span class="text"><strong>List</strong> Client</span></h4>

<table id="example1" class="table table-bordered table-striped">
 <thead>
<tr>
	<th>id_client</th>
	<th>nom</th>
	<th>prenom</th>
	<th>email</th>
<!--	<th>motDePasse</th>-->
	<th>contact</th>
	<th>action</th> 
</tr>
</thead>
<tbody>
<?php
foreach($res as $obj){
?>
<tr>
	<td><?php echo $obj->id_client;?></td>
	<td><?php echo $obj->nom;?></td>
	<td><?php echo $obj->prenom;?></td>
	<td><?php echo $obj->email;?></td>
<!--	<td>--><?php //echo $obj->motDePasse;?><!--</td>-->
	<td><?php echo $obj->contact;?></td>
<td><a href="index.php?controller=client&action=delete&id_client=<?php echo $obj->id_client;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supp.</a>
| <a href="index.php?controller=client&action=edit1&id_client=<?php echo $obj->id_client;?>">modif.</a></td></tr>
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

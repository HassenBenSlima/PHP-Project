<h4 class="title"><span class="text"><strong>Liste </strong> categories </span></h4>


<table id="example1" class="table table-bordered table-striped">
 <thead>
<tr>
	<th>id_categorie</th>
	<th>nom</th>
	<th>action</th> 
</tr>
</thead>
<tbody>
<?php
foreach($res as $obj){
?>
<tr>
	<td><?php echo $obj->id_categorie;?></td>
	<td><?php echo $obj->nom;?></td>
<td><a href="index.php?controller=categorie&action=delete&id_categorie=<?php echo $obj->id_categorie;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supp.</a>
| <a href="index.php?controller=categorie&action=edit1&id_categorie=<?php echo $obj->id_categorie;?>">modif.</a></td></tr>
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

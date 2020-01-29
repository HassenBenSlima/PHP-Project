
<h4 class="title"><span class="text"><strong>Liste </strong> Types </span></h4>

<table id="example1" class="table table-bordered table-striped">
 <thead>
<tr>
	<th>id_type</th>
	<th>nom</th>
	<th>prixu</th>
	<th>qte</th>
	<th>action</th> 
</tr>
</thead>
<tbody>
<?php
foreach($res as $obj){
?>
<tr>
	<td><?php echo $obj->id_type;?></td>
	<td><?php echo $obj->nom;?></td>
	<td><?php echo $obj->prixu;?></td>
	<td><?php echo $obj->qte;?></td>
<td><a href="index.php?controller=type&action=delete&id_type=<?php echo $obj->id_type;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supp.</a>
| <a href="index.php?controller=type&action=edit1&id_type=<?php echo $obj->id_type;?>">modif.</a></td></tr>
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

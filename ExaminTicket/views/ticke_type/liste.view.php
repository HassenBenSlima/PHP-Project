<table id="example1" class="table table-bordered table-striped">
 <thead>
<tr>
	<th>id</th>
	<th>id_ticket</th>
	<th>id_type</th>
	<th>qte</th>
	<th>action</th> 
</tr>
</thead>
<tbody>
<?php
foreach($res as $obj){
?>
<tr>
	<td><?php echo $obj->id;?></td>
	<td><?php echo $obj->id_ticket;?></td>
	<td><?php echo $obj->id_type;?></td>
	<td><?php echo $obj->qte;?></td>
<td><a href="index.php?controller=ticke_type&action=delete&id=<?php echo $obj->id;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supp.</a>
| <a href="index.php?controller=ticke_type&action=edit1&id=<?php echo $obj->id;?>">modif.</a></td></tr>
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

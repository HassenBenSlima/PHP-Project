<table id="example1" class="table table-bordered table-striped">
 <thead>
<tr>
<!--	<th>id_ticket</th>-->
	<th>photos</th>
    <th>nom</th>
    <th>description</th>
	<th>date</th>
	<th>id_categorie</th>
	<th>place</th>
	<th>ville</th>
	<th>action</th> 
</tr>
</thead>
<tbody>
<?php
foreach($res as $obj){
?>
<tr>
<!--	<td><?php /*echo $obj->id_ticket;*/?></td>
-->    <td><?php if (!empty ($obj->photo)) { ?><img src="files/<?php echo $obj->photo;?>" width="150"><?php } ?></td>
    <td><?php echo $obj->nom;?></td>
	<td><?php echo $obj->description;?></td>
	<td><?php echo $obj->date;?></td>
	<td><?php echo $obj->id_categorie;?></td>
	<td><?php echo $obj->place;?></td>
	<td><?php echo $obj->ville;?></td>

<td><a href="index.php?controller=ticket&action=delete&id_ticket=<?php echo $obj->id_ticket;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supprimer.</a>
| <a href="index.php?controller=ticket&action=edit1&id_ticket=<?php echo $obj->id_ticket;?>">modifier.</a></td></tr>
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
<div class="pagination pagination-small pagination-centered">
    <ul>
        <li><a href="#">Prev</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>
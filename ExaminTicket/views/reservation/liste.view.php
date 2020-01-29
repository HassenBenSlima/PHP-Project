<table id="example1" class="table table-bordered table-striped">
 <thead>
<tr><th>client</th>
<!--	<th>id_cmd</th>-->
    	<th>email</th>

    <th>date</th>
<!--	<th>id_client</th>-->
	<th>action</th> 
</tr>
</thead>
<tbody>
<?php
foreach($res as $obj){
?>
<tr>
    <td><?php echo $obj->nom;?></td>
    <td><?php echo $obj->email;?></td>

    <!--	<td>--><?php //echo $obj->id_cmd;?><!--</td>-->
	<td><?php echo $obj->date;?></td>
<!--	<td>--><?php //echo $obj->id_client;?><!--</td>-->
<td><a href="index.php?controller=reservation&action=delete&id_cmd=<?php echo $obj->id_cmd;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supp.</a>
| <a href="index.php?controller=reservation&action=edit1&id_cmd=<?php echo $obj->id_cmd;?>">modif.</a></td></tr>
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

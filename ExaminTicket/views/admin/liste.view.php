<h4 class="title"><span class="text"><strong>Liste</strong> Admins</span></h4>


<table id="example1" class="table table-bordered table-striped">
 <thead>
<tr>
<!--	<th>id</th>-->
	<th>login</th>
<!--	<th>pass</th>-->
	<th>nom</th>
	<th>action</th> 
</tr>
</thead>
<tbody>
<?php
foreach($res as $obj){
?>
<tr>
<!--	<td>--><?php //echo $obj->id;?><!--</td>-->
	<td><?php echo $obj->login;?></td>
	<!--<td><?php /*echo $obj->pass;*/?></td>-->
	<td><?php echo $obj->nom;?></td>
<td><a href="index.php?controller=admin&action=delete&id=<?php echo $obj->id;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supprimer</a>
| <a href="index.php?controller=admin&action=edit1&id=<?php echo $obj->id;?>">modifier</a></td></tr>
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
<h4 class="title"><span class="text"><strong></strong> </span></h4>

<table border="1">
<tr>
	<th>designation marque</th>
	<th>actions</th>
</tr>
<?php
foreach($res as $obj){
?>
<tr>
	<td><?php echo $obj->design_marque;?></td>
	<td><a href="index.php?controller=marque&action=delete_marque&id_marque=<?php echo $obj->id_marque;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supp.</a> 
	| <a href="index.php?controller=marque&action=edit1&id_marque=<?php echo $obj->id_marque;?>">modif.</td>
</tr>
<?php
}
?>

</table>
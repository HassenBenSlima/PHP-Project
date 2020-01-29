<?php
include "include/connexion.php";

echo "######################################################<br>
########### GENERATION DES CONTROLEURS ##########<br>
######################################################
<br>";

$req=$cnx->query("SHOW TABLES");
while($res=$req->fetch()){
//créer un dossier pour chaque ojet dans le dossiers views/
if(!file_exists("views/".$res[0]))
	mkdir("views/".$res[0], 0777, true);

$req1=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$res[0]."' AND table_schema='".$db_name."'");
$res1=$req1->fetchAll();

//generer controller
$fic=fopen("controllers/".$res[0].".controller.php", "w+");
$contenu="<?php
include \"models/".$res[0].".class.php\";
//initialisation des attributs de l’objet voiture
";
foreach($res1 as $val){
$contenu.="$".$val['COLUMN_NAME']."='';
";
}
$contenu.="
//récuperation des valeurs des attributs de l’objet voiture
";
foreach($res1 as $val2){
$contenu.="if(isset(\$_REQUEST['".$val2['COLUMN_NAME']."'])) 
	\$".$val2['COLUMN_NAME']."=\$_REQUEST['".$val2['COLUMN_NAME']."'];
";
}

$contenu.="
//Instanciation de l’objet voiture
\$inst=new ".$res[0]."(";
$i=0;
foreach($res1 as $val){
$contenu.="$".$val['COLUMN_NAME'];
$i++;
if($i<count($res1))
$contenu.=",";
}
$contenu.=");
";
$contenu.="
switch(\$action){
case 'ajout1' : include 'views/".$res[0]."/ajout1.view.php';
break;

case 'ajout' : \$inst->ajout(\$cnx);
break;

case 'liste': \$res=\$inst->liste(\$cnx);
	include 'views/".$res[0]."/liste.view.php';
	break;
	
	case 'edit1': 
	\$res=\$inst->listWhereId(\$cnx);
	include 'views/".$res[0]."/edit.view.php';
	break;
	
	case 'edit': \$inst->edit(\$cnx);
	break;
	
	case 'delete': \$inst->delete(\$cnx);
	break;
	
}
?>";
fwrite($fic,$contenu,100000000);
fclose($fic);
echo "<font color='green'>le controller ".$res[0]." est créé avec succes.</font><br>";
}



//generer les models
echo "<br>######################################################<br>
############# GENERATION DES MODELES #############<br>
######################################################
<br>";
$req=$cnx->query("SHOW TABLES");
while($res=$req->fetch()){

$req1=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$res[0]."' AND table_schema='".$db_name."'");
$res1=$req1->fetchAll();

//generer model
$fic=fopen("models/".$res[0].".class.php", "w+");
$contenu="<?php
class ".$res[0]." extends fonctions{
//initialisation des attributs de l’objet voiture
";
foreach($res1 as $val){
$contenu.="private $".$val['COLUMN_NAME'].";\n";
}
$contenu.="\n//constructeur\n";

$contenu.="public function __construct(";

$i=0;
foreach($res1 as $val){
$contenu.="\$".$val['COLUMN_NAME'];
$i++;
if($i<count($res1))
$contenu.=",";
}
$contenu.=")
{
";
foreach($res1 as $val){
	$contenu.="	";
$contenu.="\$this->".$val['COLUMN_NAME']."=\$".$val['COLUMN_NAME'].";
";
}
$contenu.="}
";
$contenu.="
//methode d'ajout
";

$contenu.="public function ajout(\$cnx){
";
$contenu.="\$cnx->exec(\"insert into ".$res[0]."(";

	$i=0;
foreach($res1 as $val){
$contenu.=$val['COLUMN_NAME'];
$i++;
if($i<count($res1))
$contenu.=",";
}
$contenu.=") values(";

$i=0;
$firstcalumn=0;
foreach($res1 as $val){

	if($res1[0]==$val){
		$firstcalumn=$val['COLUMN_NAME'];
	}
$contenu.=" '\".\$this->".$val['COLUMN_NAME'].".\"'";
$i++;
if($i<count($res1))
$contenu.=",";
}
$contenu.=")\");
";

$contenu.="\$this->redirect(\"index.php?controller=".$res[0]."&action=liste\");
";
$contenu.="}
";
$contenu.="
//methode de selection
";
$contenu.="public function liste(\$cnx){
";
$contenu.="\$resultat =\$cnx->query(\"select * from ".$res[0]."\")->fetchAll(PDO::FETCH_OBJ);
";
$contenu.="return \$resultat;
}";

$contenu.="
//methode de selection whre id 
";
$contenu.="public function listWhereId(\$cnx){
";
$contenu.="\$resultat =\$cnx->query(\"select * from ".$res[0];
$contenu.=" where ".$firstcalumn."='\".\$this->".$firstcalumn.".\"'";
$contenu.="\")->fetch(PDO::FETCH_OBJ);
	 
";
$contenu.="return \$resultat;
}";


$contenu.="
//methode de edit
";
$contenu.="public function edit(\$cnx){
";
$contenu.="\$cnx->exec(\"update ".$res[0]." set ";

$i=1;
foreach($res1 as $val){
	if($val == $res1[0]){
		$ide=$val['COLUMN_NAME'];
	}
	if($val != $res1[0]){
$contenu.=$val['COLUMN_NAME']."="." '\".\$this->".$val['COLUMN_NAME'].".\"'";

$i++;
if($i<count($res1))
$contenu.=",";
}
}
$contenu.=" where ".$ide."='\".\$this->".$ide.".\"'";
$contenu.="\");
";
$contenu.="\$this->redirect(\"index.php?controller=".$res[0]."&action=liste\");
";
$contenu.="
}";

$contenu.="
//methode de delete
";
$contenu.="public function delete(\$cnx){
";
$contenu.="\$cnx->exec(\"delete from ".$res[0]."";

$i=1;
foreach($res1 as $val){
	if($val == $res1[0]){
		$ide=$val['COLUMN_NAME'];
		//$contenu.=$val['COLUMN_NAME']."="." '\".\$this->".$val['COLUMN_NAME'].".\"'";
	}

}
$contenu.=" where ".$ide."='\".\$this->".$ide.".\"'";
$contenu.="\");
";
$contenu.="\$this->redirect(\"index.php?controller=".$res[0]."&action=liste\");
";
$contenu.="
}";
$contenu.="
}";
$contenu.="

?>";
fwrite($fic,$contenu,100000000);
fclose($fic);
echo "<font color='green'>le model ".$res[0]." est créé avec succes.</font><br>";
}

//generer les views
echo "<br>######################################################<br>
############### GENERATION DES VUES ###############<br>
######################################################
<br>";
$req=$cnx->query("SHOW TABLES");
//$req111=$req->fetch();
while($res=$req->fetch()){
//créer un dossier pour chaque ojet dans le dossiers views/

$req1=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$res[0]."' AND table_schema='".$db_name."'");
$res1=$req1->fetchAll();

//generer views
//view ajout
$fic=fopen("views/".$res[0]."/ajout1.view.php", "w+");

$contenu="";
$contenu.="<form method=\"post\" action=\"index.php?controller=".$res[0]."&action=ajout\" enctype=\"multipart/form-data\">
";

foreach($res1 as $val){
	if($val != $res1[0]){
$contenu.=" <label>".$val['COLUMN_NAME']." </label>:";

$contenu.="<input type=\"text\" name=\"".$val['COLUMN_NAME']."\">
<br>
";
	}
}
$contenu.="<input type=\"submit\" value=\"ajouter\">";
$contenu.="</form>";

fwrite($fic,$contenu,100000000);
fclose($fic);
echo "<font color='green'>le ajout view ".$res[0]." est créé avec succes.</font><br>";


//view liste
$fic=fopen("views/".$res[0]."/liste.view.php", "w+");
$contenu="<table id=\"example1\" class=\"table table-bordered table-striped\">
";
$contenu.=" <thead>
";
$contenu.="<tr>
";

foreach($res1 as $val){
$contenu.="	<th>".$val['COLUMN_NAME']."</th>
";
}
$contenu.="	<th>action</th> 
";
$contenu.="</tr>
";
$contenu.="</thead>
";
$contenu.="<tbody>
";
$contenu.="<?php
";
$contenu.="foreach(\$res as \$obj){
";
$contenu.="?>
";
$contenu.="<tr>
";


foreach($res1 as $val){
	if($val == $res1[0]){
		$ide=$val['COLUMN_NAME'];
	}
$contenu.="	<td><?php echo \$obj->".$val['COLUMN_NAME'].";?></td>
";
}
$contenu.="<td><a href=\"index.php?controller=".$res[0]."&action=delete&".$ide."=<?php echo \$obj->".$ide.";?>\" onclick=\"if(confirm('etes vous sure de supprimer?')) return true; else return false;\">supp.</a>
";
$contenu.="| <a href=\"index.php?controller=".$res[0]."&action=edit1&".$ide."=<?php echo \$obj->".$ide.";?>\">modif.</a></td>";
$contenu.="</tr>
";
$contenu.="<?php 
}
?>
<script>
  \$(function () {
    \$('#example1').DataTable()
    \$('#example2').DataTable({
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
";
fwrite($fic,$contenu,100000000);
fclose($fic);
echo "<font color='green'>le liste ".$res[0]." est créé avec succes.</font><br>";


//view edite
$fic=fopen("views/".$res[0]."/edit.view.php", "w+");
$contenu="<form method=\"post\" action=\"index.php?controller=".$res[0]."&action=edit\" enctype=\"multipart/form-data\">
";
$contenu.="<h1>Modifier".$res[0]."</h1>
";

foreach($res1 as $val){
$contenu.="<br>".$val['COLUMN_NAME']." <input type=\"text\" name=\"".$val['COLUMN_NAME']."\" value=\"<?php echo \$res->".$val['COLUMN_NAME'].";?>\">
";
}

$contenu.="<br><input type=\"submit\" value=\"Modifier ".$res[0]."\">
<input type=\"reset\" value=\"annuler\">
</form>
";

fwrite($fic,$contenu,100000000);
fclose($fic);
echo "<font color='green'>le edit ".$res[0]." est créé avec succes.</font><br>";

//echo "1225fezf";


}
?>

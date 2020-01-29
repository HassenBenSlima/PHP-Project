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

case 'ajout' : \$inst->ajout();
break;

case 'liste': \$res=\$inst->liste(\$cnx);
	include 'views/".$res[0]."/liste.view.php';
	break;
	
	case 'edit1': 
	\$res=\$inst->view(\$cnx);
	include 'views/".$res[0]."/edit.view.php';
	break;
	
	case 'edit': \$inst->edit(\$cnx);
	break;
	
	case 'delete': \$v->delete(\$cnx);
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

//generer controller
    $fic=fopen("models/".$res[0].".class.php", "w+");
    $contenu="<?php

//initialisation des attributs de l’objet";

    $contenu.="
    class ".$res[0]."  extends fonctions \n { ";

    foreach($res1 as $val){
        $contenu.="private \$".$val['COLUMN_NAME']."; \n";
    }
    $contenu.="
//récuperation des valeurs des attributs de l’objet voiture
";

    $contenu.="
//Constructeur
public function __construct(";
    $i=0;
    foreach($res1 as $val){
        $contenu.="\$".$val['COLUMN_NAME'];
        $i++;
        if($i<count($res1))
            $contenu.=",";
    }
    $contenu.=") 
{";

    foreach($res1 as $val){
        $contenu.="\$this->".$val['COLUMN_NAME']."=\$".$val['COLUMN_NAME'].";
        ";
    }
    $contenu.="}" ;

    $contenu.="
    public function add(\$cnx){
    
    \$cnx->exec(\"insert into".$res[0]."(";
    $i=0;
    foreach($res1 as $val){
        $contenu.=$val['COLUMN_NAME'];
        $i++;
        if($i<count($res1))
            $contenu.=",";
    }
    $contenu.=") values (";
    $i=0;
    foreach($res1 as $val){
        $contenu.="'\".\$this->".$val['COLUMN_NAME'].".\"'";
        $i++;
        if($i<count($res1))
            $contenu.=",";
    }

    $contenu.=")\");
    ";

    $contenu.="\$this->redirect(\"index.php?controllers=".$res[0]."&actions=liste\"); \n ";

    $contenu.="}";

    $contenu.="
    public function update(\$cnx){
    
    \$cnx->exec(\"update ".$res[0]." set ";
    $i=0;
    foreach($res1 as $val){
        if($i==0){
        $id=$val['COLUMN_NAME'];
        }
        $contenu.=$val['COLUMN_NAME']." = ";
        $contenu.="'\".\$this->".$val['COLUMN_NAME'].".\"'";
        $i++;
        if($i<count($res1))
            $contenu.=",";
    }

    $contenu.=" where ".$id."='\". \$this->".$id.".\"'\");\n";


    $contenu.="parent::redirect(\"index.php?controllers=".$res[0]."&actions=liste\"); \n ";

    $contenu.="}\n";




    $contenu.="
    public function delete(\$cnx){
    
    \$cnx->exec(\"delete from ".$res[0];

    $contenu.=" where ".$id."='\". \$this->".$id.".\"'\");\n";


    $contenu.="parent::redirect(\"index.php?controllers=".$res[0]."&actions=liste\"); \n ";

    $contenu.="}\n";




    $contenu.="
    public function view(\$cnx){
    
    \$resultat=\$cnx->query(\"select * from ".$res[0];

    $contenu.=" where ".$id."='\". \$this->".$id.".\"'\")->fetch(PDO::FETCH_OBJ);\n";

    $contenu.="return \$resultat; \n ";

    $contenu.="}\n";


    $contenu.="
    public function liste(\$cnx){
    
    \$resultat=\$cnx->query(\"select * from ".$res[0]."\" )->fetchAll(PDO::FETCH_OBJ);\n";


    $contenu.="return \$resultat; \n ";

    $contenu.="}\n";
    $contenu.="} 
   ?>" ;

    fwrite($fic,$contenu,100000000);
    fclose($fic);
    echo "<font color='green'>le controller ".$res[0]." est créé avec succes.</font><br>";
}


echo ".........";
//generer les views
echo "<br>######################################################<br>
############### GENERATION DES VUES ###############<br>
######################################################
<br>";
echo ".........";



$req=$cnx->query("SHOW TABLES");
while($res=$req->fetch()){
//créer un dossier pour chaque ojet dans le dossiers views/


  $req1=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$res[0]."' AND table_schema='".$db_name."'");
    $res1=$req1->fetchAll();

//generer views add
    $fic=fopen("views/".$res[0]."/add.view.php", "w+");
    $contenu="<form  method=\"post\" 
    action=\"index.php?controllers=".$res[0]."&action=ajout\" 
    enctype= \"multipart/form-data\"> \n
";
    $i=0;
    foreach($res1 as $val)
    {
    if($i!=0){

        $contenu.="<label>".$val['COLUMN_NAME']."</label><br>  \n
        <input type=\"texte\" name=\"".$val['COLUMN_NAME']."\" class=\"form-control\" \>\n
        ";
    }
    $i++;
    }

    $contenu.="<input type=\"submit\" class=\"btn  btn-3d btn-success\" value=\"Ajouter\"/> \n 
</form>";


    //generer views edit
    $fic=fopen("views/".$res[0]."/edit.view.php", "w+");
    $contenu="<form  method=\"post\" 
    action=\"index.php?controllers=".$res[0]."&action=edit\" 
    enctype= \"multipart/form-data\"> \n
";

    foreach($res1 as $val)
    {
            $contenu.="<label>".$val['COLUMN_NAME']."</label><br>  \n
        <input type=\"texte\" name=\"".$val['COLUMN_NAME']."\" value=\"<?php \$res->".$val['COLUMN_NAME']." ?>\" class=\"form-control\" \>\n";

    }

    $contenu.="<input type=\"submit\" class=\"btn  btn-3d btn-success\" value=\"Modifier\"/> \n 
</form>";



    //generer views list
    $fic=fopen("views/".$res[0]."/edit.view.php", "w+");

    foreach($res1 as $val)
    {
        $contenu.="<label>".$val['COLUMN_NAME']."</label><br>  \n
       
    
    $contenu=<table>
    <tr>
        <th>".$val['COLUMN_NAME']."</th>
      
    </tr>
";

    foreach($res1 as $val)
    { $tab=explode("_",$val['COLUMN_NAME']);


        $contenu.="
         <tr>
     <?php
     foreach (\$res as \$obj){
     ?>
        <td><?php echo \$obj->".$val['COLUMN_NAME']." ;?></td>
       ";
             if($tab[0]=="photo")
             {
                 $contenu.="
                 <td><?php  if(!empty($obj->photo_voit)) {?><img width=\\"100\\" src=\\"files /<?php echo $obj->photo_voit;?>\\" /> <?php  } ?></td>
                           ";
             }
             }

        }
      
        <td> <a  href=\"index.php?controller=voitures&action=delete_voit&id_voit=<?php echo $obj->id_voit ;?>\" onclick=\"if(confirm('Etes vous sure de supprimer?')) return true ;else return false;\">Supprimer</a>
            |<a  href=\"index.php?controller=voitures&action=edit1&id_voit=<?php echo $obj->id_voit ;?>\">Modifier</a></td>

    </tr>




    }

</table>
        

    }

    $contenu.="<input type=\"submit\" class=\"btn  btn-3d btn-success\" value=\"Modifier\"/> \n 
</form>";

    fwrite($fic,$contenu,100000000);
    fclose($fic);
    echo "<font color='green'>le controller ".$res[0]." est créé avec succes.</font><br>";
}



?>
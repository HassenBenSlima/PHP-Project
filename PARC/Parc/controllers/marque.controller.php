


<?php include "models/marque.class.php"; 

//initialisation des parametres
$id_marque="";
$design_marque="";

//recuparation des parametres
if(isset($_REQUEST['id_marque']))
	$id_marque=$_REQUEST['id_marque'];

if(isset($_REQUEST['design_marque']))
	$design_marque=$_REQUEST['design_marque'];


//instanciation

$m=new marque($id_marque,$design_marque);

switch($action){
	case "add1": include "views/marque/add_marque.view.php";
	break;
	case "add_marque": $m->add_marque($cnx);
	break;
	
	case "list_marque": $res=$m->list_marque($cnx);
	include "views/marque/list_marque.view.php";
	break;
	
	case "edit1": 
	$res=$m->view_marque($cnx);
	include "views/marque/edit_marque.view.php";
	break;
	case "edit_marque": $m->edit_marque($cnx);
	break;
	
	case "delete_marque":  unlink("files/".$photo_marque);
	$m->delete_marque($cnx);
	
	break;
}		
	
?>
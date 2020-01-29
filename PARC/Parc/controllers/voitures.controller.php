


<?php include "models/voitures.class.php"; 
include "models/marque.class.php"; 

//initialisation des parametres
$id_voit="";
$nom_voit="";
$photo_voit="";
$marque_voit="";
$couleur_voit="";

$id_marque="";
$design_marque="";

//recuparation des parametres
if(isset($_REQUEST['id_voit']))
	$id_voit=$_REQUEST['id_voit'];

if(isset($_REQUEST['nom_voit']))
	$nom_voit=$_REQUEST['nom_voit'];

if(isset($_REQUEST['photo_voit']))
	$photo_voit=$_REQUEST['photo_voit'];

if(isset($_REQUEST['modif']))
		$photo_voit=$_REQUEST['modif'];

	//print_r($_FILES['photo_voit']);
	//exit;
//recuperation de l'image de voiture
if(isset($_FILES['photo_voit']) && $_FILES['photo_voit']['error']==0){
	if(isset($_REQUEST['modif']))
		unlink("files/".$_REQUEST['modif']);


$photo_voit=$_FILES['photo_voit']['name'];

$tab=explode('.',$photo_voit);
$photo_voit=$tab[0]."_".$id_voit.".".$tab[1];
$tmp=$_FILES['photo_voit']['tmp_name'];

copy($tmp,"files/".$photo_voit);
}


if(isset($_REQUEST['marque_voit']))
	$marque_voit=$_REQUEST['marque_voit'];


if(isset($_REQUEST['couleur_voit']))
	$couleur_voit=$_REQUEST['couleur_voit'];

//instanciation

$v=new voitures($id_voit,$nom_voit,$photo_voit,$marque_voit,$couleur_voit);
$m=new marque($id_marque,$design_marque);

switch($action){
	case "add1": 
	$res=$m->list_marque($cnx);
	include "views/voitures/add_voit.view.php";
	break;
	case "add_voit": $v->add_voit($cnx);
	break;
	
	case "list_voit": $res=$v->list_voit($cnx);
	include "views/voitures/list_voit.view.php";
	break;
	
	case "edit1": 
	$res=$v->view_voit($cnx);
	include "views/voitures/edit_voit.view.php";
	break;
	case "edit_voit": $v->edit_voit($cnx);
	break;
	
	case "delete_voit":  unlink("files/".$photo_voit);
	$v->delete_voit($cnx);
	
	break;
}		
	
?>
<?php
include "models/voitures.class.php";
//initialisation des attributs de l’objet voiture
$id_voit='';
$nom_voit='';
$photo_voit='';
$marque_voit='';
$couleur_voit='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id_voit'])) 
	$id_voit=$_REQUEST['id_voit'];
if(isset($_REQUEST['nom_voit'])) 
	$nom_voit=$_REQUEST['nom_voit'];
if(isset($_REQUEST['photo_voit'])) 
	$photo_voit=$_REQUEST['photo_voit'];
if(isset($_REQUEST['marque_voit'])) 
	$marque_voit=$_REQUEST['marque_voit'];
if(isset($_REQUEST['couleur_voit'])) 
	$couleur_voit=$_REQUEST['couleur_voit'];

//Instanciation de l’objet voiture
$inst=new voitures($id_voit,$nom_voit,$photo_voit,$marque_voit,$couleur_voit);

switch($action){
case 'ajout1' : include 'views/voitures/ajout1.view.php';
break;

case 'ajout' : $inst->ajout();
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/voitures/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->view($cnx);
	include 'views/voitures/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $v->delete($cnx);
	break;
	
}
?>
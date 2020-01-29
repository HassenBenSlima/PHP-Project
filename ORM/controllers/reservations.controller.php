<?php
include "models/reservations.class.php";
//initialisation des attributs de l’objet voiture
$id_reserv='';
$date_debut='';
$date_fin='';
$prix_reserv='';
$nom_clt='';
$prenom_clt='';
$cin_clt='';
$id_voit='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id_reserv'])) 
	$id_reserv=$_REQUEST['id_reserv'];
if(isset($_REQUEST['date_debut'])) 
	$date_debut=$_REQUEST['date_debut'];
if(isset($_REQUEST['date_fin'])) 
	$date_fin=$_REQUEST['date_fin'];
if(isset($_REQUEST['prix_reserv'])) 
	$prix_reserv=$_REQUEST['prix_reserv'];
if(isset($_REQUEST['nom_clt'])) 
	$nom_clt=$_REQUEST['nom_clt'];
if(isset($_REQUEST['prenom_clt'])) 
	$prenom_clt=$_REQUEST['prenom_clt'];
if(isset($_REQUEST['cin_clt'])) 
	$cin_clt=$_REQUEST['cin_clt'];
if(isset($_REQUEST['id_voit'])) 
	$id_voit=$_REQUEST['id_voit'];

//Instanciation de l’objet voiture
$inst=new reservations($id_reserv,$date_debut,$date_fin,$prix_reserv,$nom_clt,$prenom_clt,$cin_clt,$id_voit);

switch($action){
case 'ajout1' : include 'views/reservations/ajout1.view.php';
break;

case 'ajout' : $inst->ajout();
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/reservations/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->view($cnx);
	include 'views/reservations/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $v->delete($cnx);
	break;
	
}
?>
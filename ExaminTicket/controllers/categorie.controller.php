<?php
//include "models/categorie.class.php";
//initialisation des attributs de l’objet voiture
$id_categorie='';
$nom='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id_categorie'])) 
	$id_categorie=$_REQUEST['id_categorie'];
if(isset($_REQUEST['nom'])) 
	$nom=$_REQUEST['nom'];

//Instanciation de l’objet voiture
$inst=new categorie($id_categorie,$nom);

switch($action){
case 'ajout1' : include 'views/categorie/ajout1.view.php';
break;

case 'ajout' : $inst->ajout($cnx);
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/categorie/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->listWhereId($cnx);
	include 'views/categorie/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $inst->delete($cnx);
	break;
	
}
?>
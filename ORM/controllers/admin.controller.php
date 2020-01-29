<?php
include "models/admin.class.php";
//initialisation des attributs de l’objet voiture
$login='';
$pass='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['login'])) 
	$login=$_REQUEST['login'];
if(isset($_REQUEST['pass'])) 
	$pass=$_REQUEST['pass'];

//Instanciation de l’objet voiture
$inst=new admin($login,$pass);

switch($action){
case 'ajout1' : include 'views/admin/ajout1.view.php';
break;

case 'ajout' : $inst->ajout();
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/admin/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->view($cnx);
	include 'views/admin/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $v->delete($cnx);
	break;
	
}
?>
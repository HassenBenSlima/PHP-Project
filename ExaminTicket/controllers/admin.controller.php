<?php
include "models/admin.class.php";
//initialisation des attributs de l’objet voiture
$id='';
$login='';
$pass='';
$nom='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id'])) 
	$id=$_REQUEST['id'];
if(isset($_REQUEST['login'])) 
	$login=$_REQUEST['login'];
if(isset($_REQUEST['pass'])) 
	$pass=$_REQUEST['pass'];
if(isset($_REQUEST['nom'])) 
	$nom=$_REQUEST['nom'];

//Instanciation de l’objet voiture
$inst=new admin($id,$login,$pass,$nom);

switch($action){
case 'ajout1' : include 'views/admin/ajout1.view.php';
break;

case 'ajout' : $inst->ajout($cnx);
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/admin/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->listWhereId($cnx);
	include 'views/admin/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $inst->delete($cnx);
	break;

    //formulaire d'authentification
    case "login1": include "views/admin/login.view.php";
        break;
    //exec authent
    case "login": $inst->login($cnx);
        break;
    //deconnexion
    case "logout": $inst->logout();
        break;


}
?>



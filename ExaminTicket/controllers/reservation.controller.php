<?php
include "models/reservation.class.php";
//initialisation des attributs de l’objet voiture
$id_cmd='';
$date='';
$id_client='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id_cmd'])) 
	$id_cmd=$_REQUEST['id_cmd'];
if(isset($_REQUEST['date'])) 
	$date=$_REQUEST['date'];
if(isset($_REQUEST['id_client'])) 
	$id_client=$_REQUEST['id_client'];

//Instanciation de l’objet voiture
$inst=new reservation($id_cmd,$date,$id_client);

switch($action){
case 'ajout1' : include 'views/reservation/ajout1.view.php';
break;

case 'ajout' : $inst->ajout($cnx);
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/reservation/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->listWhereId($cnx);
	include 'views/reservation/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $inst->delete($cnx);
	break;
	
}
?>
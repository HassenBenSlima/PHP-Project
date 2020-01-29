<?php
include "models/ticke_type.class.php";
//initialisation des attributs de l’objet voiture
$id='';
$id_ticket='';
$id_type='';
$qte='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id'])) 
	$id=$_REQUEST['id'];
if(isset($_REQUEST['id_ticket'])) 
	$id_ticket=$_REQUEST['id_ticket'];
if(isset($_REQUEST['id_type'])) 
	$id_type=$_REQUEST['id_type'];
if(isset($_REQUEST['qte'])) 
	$qte=$_REQUEST['qte'];

//Instanciation de l’objet voiture
$inst=new ticke_type($id,$id_ticket,$id_type,$qte);

switch($action){
case 'ajout1' : include 'views/ticke_type/ajout1.view.php';
break;

case 'ajout' : $inst->ajout($cnx);
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/ticke_type/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->listWhereId($cnx);
	include 'views/ticke_type/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $inst->delete($cnx);
	break;
	
}
?>
<?php
include "models/ligne_cmd.class.php";
//initialisation des attributs de l’objet voiture
$id='';
$qte='';
$id_cmd='';
$id_ticket='';
$prixu='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id'])) 
	$id=$_REQUEST['id'];
if(isset($_REQUEST['qte'])) 
	$qte=$_REQUEST['qte'];
if(isset($_REQUEST['id_cmd'])) 
	$id_cmd=$_REQUEST['id_cmd'];
if(isset($_REQUEST['id_ticket'])) 
	$id_ticket=$_REQUEST['id_ticket'];
if(isset($_REQUEST['prixu'])) 
	$prixu=$_REQUEST['prixu'];

//Instanciation de l’objet voiture
$inst=new ligne_cmd($id,$qte,$id_cmd,$id_ticket,$prixu);

switch($action){
case 'ajout1' : include 'views/ligne_cmd/ajout1.view.php';
break;

case 'ajout' : $inst->ajout($cnx);
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/ligne_cmd/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->listWhereId($cnx);
	include 'views/ligne_cmd/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $inst->delete($cnx);
	break;

	case 'deletersv': $inst->deletersv($cnx);
        break;
}
?>
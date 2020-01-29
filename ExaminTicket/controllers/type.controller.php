<?php


//initialisation des attributs de l’objet voiture
$id_type='';
$nom='';
$prixu='';
$qte='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id_type'])) 
	$id_type=$_REQUEST['id_type'];
if(isset($_REQUEST['nom'])) 
	$nom=$_REQUEST['nom'];
if(isset($_REQUEST['prixu'])) 
	$prixu=$_REQUEST['prixu'];
if(isset($_REQUEST['qte'])) 
	$qte=$_REQUEST['qte'];


//Instanciation de l’objet voiture
$inst=new type($id_type,$nom,$prixu,$qte);

switch($action){
case 'ajout1' : include 'views/type/ajout1.view.php';
break;

case 'ajout' :


    $inst->ajout($cnx);
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/type/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->listWhereId($cnx);
	include 'views/type/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $inst->delete($cnx);
	break;


	
}
?>
<?php
include "models/marque.class.php";
//initialisation des attributs de l’objet voiture
$id_marque='';
$design_marque='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id_marque'])) 
	$id_marque=$_REQUEST['id_marque'];
if(isset($_REQUEST['design_marque'])) 
	$design_marque=$_REQUEST['design_marque'];

//Instanciation de l’objet voiture
$inst=new marque($id_marque,$design_marque);

switch($action){
case 'ajout1' : include 'views/marque/ajout1.view.php';
break;

case 'ajout' : $inst->ajout();
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/marque/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->view($cnx);
	include 'views/marque/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $v->delete($cnx);
	break;
	
}
?>
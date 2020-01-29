<?php
include "models/client.class.php";
include "models/ligne_cmd.class.php";
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

//initialisation des attributs de l’objet voiture
$id_client='';
$nom='';
$prenom='';
$email='';
$motDePasse='';
$contact='';

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id_client'])) 
	$id_client=$_REQUEST['id_client'];
if(isset($_REQUEST['nom'])) 
	$nom=$_REQUEST['nom'];
if(isset($_REQUEST['prenom'])) 
	$prenom=$_REQUEST['prenom'];
if(isset($_REQUEST['email'])) 
	$email=$_REQUEST['email'];
if(isset($_REQUEST['motDePasse'])) 
	$motDePasse=$_REQUEST['motDePasse'];
if(isset($_REQUEST['contact'])) 
	$contact=$_REQUEST['contact'];

//Instanciation de l’objet voiture
$inst=new client($id_client,$nom,$prenom,$email,$motDePasse,$contact);
$inst1=new ligne_cmd($id,$qte,$id_cmd,$id_ticket,$prixu);

switch($action){
case 'ajout1' : include 'views/client/ajout1.view.php';
break;

case 'ajout' : $inst->ajout($cnx);
break;

case 'liste': $res=$inst->liste($cnx);
	include 'views/client/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->listWhereId($cnx);
	include 'views/client/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $inst->delete($cnx);
	break;

    //formulaire d'authentification
    case "login1": include "views/client/login.view.php";
        break;
    //exec authent
    case "login": $inst->login($cnx);
        break;
    //deconnexion
    case "logout": $inst->logout();
        break;

    case 'detail':
        $res=$inst->listWhereId($cnx);
        $res1=$inst1->listeCmd($cnx,$id);
        include 'views/client/client_detail.vew.php';
        break;

}
?>
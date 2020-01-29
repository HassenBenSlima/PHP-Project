<?php
//include "models/ticket.class.php";

//initialisation des attributs de l’objet voiture
$id_ticket='';
$nom='';
$description='';
$date='';
$id_categorie='';
$place='';
$ville='';
$photo='';
$values='';
$m='';
$id='';
$qte='';

$datecat='';
$idcat='';


if(isset($_REQUEST['datecat']))
    $datecat=$_REQUEST['datecat'];

if(isset($_REQUEST['idcat']))
    $idcat=$_REQUEST['idcat'];

if(isset($_REQUEST['qte']))
    $qte=$_REQUEST['qte'];

if(isset($_REQUEST['id']))
    $id=$_REQUEST['id'];


if(isset($_REQUEST['ary']))
    $values=$_REQUEST['ary'];

if(isset($_REQUEST['m']))
    $m=$_REQUEST['m'];

//récuperation des valeurs des attributs de l’objet voiture
if(isset($_REQUEST['id_ticket'])) 
	$id_ticket=$_REQUEST['id_ticket'];
if(isset($_REQUEST['nom'])) 
	$nom=$_REQUEST['nom'];
if(isset($_REQUEST['description'])) 
	$description=$_REQUEST['description'];
if(isset($_REQUEST['date'])) 
	$date=$_REQUEST['date'];
if(isset($_REQUEST['id_categorie'])) 
	$id_categorie=$_REQUEST['id_categorie'];
if(isset($_REQUEST['place'])) 
	$place=$_REQUEST['place'];
if(isset($_REQUEST['ville'])) 
	$ville=$_REQUEST['ville'];

if(isset($_FILES['photo']) && $_FILES['photo']['error']==0){
    if(isset($_REQUEST['modif']))
        unlink("files/".$_REQUEST['modif']);


    $photo=$_FILES['photo']['name'];

    $tab=explode('.',$photo);
    $photo=$tab[0]."_".$id_ticket.".".$tab[1];
    $tmp=$_FILES['photo']['tmp_name'];

    copy($tmp,"files/".$photo);
}


//Instanciation de l’objet voiture
$inst=new ticket($id_ticket,$nom,$description,$date,$id_categorie,$place,$ville,$photo);

$typ=new type($id_type,$nom);
$cat=new categorie($id_categorie,$nom);

$tt=new ticke_type($id);

switch($action){

case 'ajout1' :

    $typp= $typ->liste($cnx);
    $catt=$cat->liste($cnx);
    include 'views/ticket/ajout1.view.php';
break;

case 'ajout' :

    $inst->ajout($cnx, $values);
break;

case 'liste':

    $res=$inst->liste($cnx);
	include 'views/ticket/liste.view.php';
	break;
	
	case 'edit1': 
	$res=$inst->listWhereId($cnx);
        $typp= $typ->liste($cnx);
        $catt=$cat->liste($cnx);
	include 'views/ticket/edit.view.php';
	break;
	
	case 'edit': $inst->edit($cnx);
	break;
	
	case 'delete': $inst->delete($cnx);
	break;



    /**
     * More
     */
    case 'detail':
        $catt=$cat->liste($cnx);
        $tick=$inst->listWhereId($cnx);
        include 'views/ticket/ticket_detail.vew.php';
        break;

    case 'liste_ticket':

        $res=$inst->liste($cnx);
        include 'views/ticket/liste_ticket.view.php';
        break;



    case 'add_panier':$inst->add_panier($cnx,$qte);
        break;

    case 'del_panier' :$inst->del_panier();
        break;

    case 'vider_panier' :$inst->vider_panier();
        break;

    case 'liste_panier':
        $a= $inst->liste($cnx);
        $b= $typ->liste($cnx);
        $catt=$cat->liste($cnx);
        include 'views/ticket/liste_panier.view.php';
        //foreach the session
        break;


    case 'changequatite':

        $tt->change_quatite($cnx,$m,$id);
    break;
    case 'tot_panier':

        $total=$inst->tot_panier($cnx);
        break;

    case 'search':

        $catt=$cat->liste($cnx);

        include 'views/ticket/search_ticket.view.php';
        //foreach the session
        break;

    case 'searchcat':

        $catt=$cat->liste($cnx);

        $res=$inst->serach($cnx,$idcat,$datecat);
       // $res=$inst->liste($cnx);
        include 'views/ticket/search_ticket.view.php';

        break;

}
?>
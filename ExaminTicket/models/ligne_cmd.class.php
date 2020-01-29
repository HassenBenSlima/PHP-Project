<?php
class ligne_cmd extends fonctions{
//initialisation des attributs de l’objet voiture
private $id;
private $qte;
private $id_cmd;
private $id_ticket;
private $prixu;

//constructeur
public function __construct($id,$qte,$id_cmd,$id_ticket,$prixu)
{
	$this->id=$id;
	$this->qte=$qte;
	$this->id_cmd=$id_cmd;
	$this->id_ticket=$id_ticket;
	$this->prixu=$prixu;
}

//methode d'ajout
public function ajout($cnx){
$cnx->exec("insert into ligne_cmd(id,qte,id_cmd,id_ticket,prixu) values( '".$this->id."', '".$this->qte."', '".$this->id_cmd."', '".$this->id_ticket."', '".$this->prixu."')");
$this->redirect("index.php?controller=ligne_cmd&action=liste");
}

//methode de selection
public function liste($cnx){
$resultat =$cnx->query("select l.id AS  id ,t.photo AS  photo,t.nom AS nomticket,l.qte AS quantite,l.prixu AS prix ,c.nom AS nomclient from reservation r,client c,ligne_cmd l,ticket t
                          where t.id_ticket=l.id_ticket and l.id_cmd=r.id_cmd and r.id_client=c.id_client")->fetchAll(PDO::FETCH_OBJ);
return $resultat;
}
//methode de selection whre id 
public function listWhereId($cnx){
$resultat =$cnx->query("select * from ligne_cmd where id='".$this->id."'")->fetch(PDO::FETCH_OBJ);
	 
return $resultat;
}
//methode de edit
public function edit($cnx){
$cnx->exec("update ligne_cmd set qte= '".$this->qte."',id_cmd= '".$this->id_cmd."',id_ticket= '".$this->id_ticket."',prixu= '".$this->prixu."' where id='".$this->id."'");
$this->redirect("index.php?controller=ligne_cmd&action=liste");

}
//methode de delete
public function delete($cnx){
$cnx->exec("delete from ligne_cmd where id='".$this->id."'");
$this->redirect("index.php?controller=ligne_cmd&action=liste");

}

//methode de delete
    public function deletersv($cnx){
        $cnx->exec("delete from ligne_cmd where id='".$this->id."'");
        $this->redirect("ecommerce.php");

    }

//methode de selection
    public function listeCmd($cnx,$id){
        $resultat =$cnx->query("select l.id AS  id ,t.photo AS  photo,t.nom AS nomticket,l.qte AS quantite,l.prixu AS prix ,c.nom AS nomclient from reservation r,client c,ligne_cmd l,ticket t
                          where t.id_ticket=l.id_ticket and l.id_cmd=r.id_cmd and r.id_client=c.id_client and c.id_client='".$id."'")->fetchAll(PDO::FETCH_OBJ);

        return $resultat;
    }

}

?>
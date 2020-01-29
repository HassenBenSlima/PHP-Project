<?php
class reservation extends fonctions{
//initialisation des attributs de l’objet voiture
private $id_cmd;
private $date;
private $id_client;

//constructeur
public function __construct($id_cmd,$date,$id_client)
{
	$this->id_cmd=$id_cmd;
	$this->date=$date;
	$this->id_client=$id_client;
}

//methode d'ajout
public function ajout($cnx){


    $a =$cnx->query("select * from ticket ")->fetchAll(PDO::FETCH_OBJ);
    $b =$cnx->query("select * from type ")->fetchAll(PDO::FETCH_OBJ);




        $this->date=date("Y-m-d");
        $this->id_client=$_SESSION['id_client'];



        $cnx->exec("insert into reservation (date,id_client) values('".$this->date."', '".$this->id_client."')");

        $this->id_cmd=$cnx->lastInsertId();
        echo $this->id_cmd;

        if(isset($_SESSION['panier'])){
            foreach ( $a as $aa){
                foreach ( $b as $bb){

                    if(isset($_SESSION['panier'][$aa->id_ticket][$bb->id_type])){

                        $cnx->exec("insert into ligne_cmd(qte,id_cmd,id_ticket,prixu) values(  '".$_SESSION['panier'][$aa->id_ticket][$bb->id_type]['qte']."', '".$this->id_cmd."', '".$_SESSION['panier'][$aa->id_ticket][$bb->id_type]['id_ticket']."', '".$_SESSION['panier'][$aa->id_ticket][$bb->id_type]['prixu']."')");

                        $old=$_SESSION['panier'][$aa->id_ticket][$bb->id_type]['qte'];

                        $resultat =$cnx->query("select * from ticke_type where id='".$_SESSION['panier'][$aa->id_ticket][$bb->id_type]['id']."'")->fetch(PDO::FETCH_OBJ);
                        $h=$resultat->qte;

                        $now= $h - $old;


                        $cnx->exec("update ticke_type set qte= '".$now."' where id='".$_SESSION['panier'][$aa->id_ticket][$bb->id_type]['id']."'");

                    }
                }
            }

            }

        unset($_SESSION['panier']);
        $this->redirect("ecommerce.php?controller=ticket&action=liste_ticket");

}

//methode de selection
public function liste($cnx){
$resultat =$cnx->query("select * from reservation r,client c where r.id_client=c.id_client")->fetchAll(PDO::FETCH_OBJ);
return $resultat;
}
//methode de selection whre id 
public function listWhereId($cnx){
$resultat =$cnx->query("select * from reservation where id_cmd='".$this->id_cmd."'")->fetch(PDO::FETCH_OBJ);
	 
return $resultat;
}
//methode de edit
public function edit($cnx){
$cnx->exec("update reservation set date= '".$this->date."',id_client= '".$this->id_client."' where id_cmd='".$this->id_cmd."'");
$this->redirect("index.php?controller=reservation&action=liste");

}
//methode de delete
public function delete($cnx){
$cnx->exec("delete from reservation where id_cmd='".$this->id_cmd."'");
$this->redirect("index.php?controller=reservation&action=liste");

}
}

?>
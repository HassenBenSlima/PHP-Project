<?php
class ticke_type extends fonctions{
//initialisation des attributs de l’objet voiture
private $id;
private $id_ticket;
private $id_type;
private $qte;

//constructeur
public function __construct1($id,$id_ticket,$id_type,$qte)
{
	$this->id=$id;
	$this->id_ticket=$id_ticket;
	$this->id_type=$id_type;
	$this->qte=$qte;
}

//constructeur
    public function __construct2($id)
    {
        $this->id=$id;
    }

//methode d'ajout
public function ajout($cnx){
$cnx->exec("insert into ticke_type(id,id_ticket,id_type,qte) values( '".$this->id."', '".$this->id_ticket."', '".$this->id_type."', '".$this->qte."')");
$this->redirect("index.php?controller=ticke_type&action=liste");
}

//methode de selection
public function liste($cnx){
$resultat =$cnx->query("select * from ticke_type")->fetchAll(PDO::FETCH_OBJ);
return $resultat;
}
//methode de selection whre id 
public function listWhereId($cnx){
$resultat =$cnx->query("select * from ticke_type where id='".$this->id."'")->fetch(PDO::FETCH_OBJ);
	 
return $resultat;
}
//methode de edit
public function edit($cnx){
$cnx->exec("update ticke_type set id_ticket= '".$this->id_ticket."',id_type= '".$this->id_type."',qte= '".$this->qte."' where id='".$this->id."'");
$this->redirect("index.php?controller=ticke_type&action=liste");

}
//methode de delete
public function delete($cnx){
$cnx->exec("delete from ticke_type where id='".$this->id."'");
$this->redirect("index.php?controller=ticke_type&action=liste");

}

    public function change_quatite($cnx,$m,$id){

        $prod =$cnx->query("select * from ticke_type where id='".$id."'")->fetch(PDO::FETCH_OBJ);

        if($m==1){

            if( $_SESSION['panier'][$prod->id_ticket][$prod->id_type]['qte']<$prod->qte){
                $_SESSION['panier'][$prod->id_ticket][$prod->id_type]['qte']++;
            }
        }else if ($m==-1){

            if( $_SESSION['panier'][$prod->id_ticket][$prod->id_type]['qte']>0){


                $_SESSION['panier'][$prod->id_ticket][$prod->id_type]['qte']--;

            }
        }

        $this->redirect("ecommerce.php?controller=ticket&action=liste_panier");

    }


}


?>
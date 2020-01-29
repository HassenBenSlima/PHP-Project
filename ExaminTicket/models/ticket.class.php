<?php
class ticket extends fonctions{
//initialisation des attributs de l’objet voiture
private $id_ticket;
private $nom;
private $description;
private $date;
private $id_categorie;
private $place;
private $ville;
private $photo;

//constructeur
public function __construct($id_ticket,$nom,$description,$date,$id_categorie,$place,$ville,$photo)
{
	$this->id_ticket=$id_ticket;
	$this->nom=$nom;
	$this->description=$description;
	$this->date=$date;
	$this->id_categorie=$id_categorie;
	$this->place=$place;
	$this->ville=$ville;
	$this->photo=$photo;
}

//methode d'ajout
public function ajout($cnx, $values){
    $this->date=date("Y-m-d");
$cnx->exec("insert into ticket(nom,description,date,id_categorie,place,ville,photo) values('".$this->nom."', '".$this->description."', '".$this->date."', '".$this->id_categorie."', '".$this->place."', '".$this->ville."', '".$this->photo."')");

    $this->id_ticket=$cnx->lastInsertId();
echo $this->id_ticket;
    foreach ($values as $a){
        echo $a;
        $req=$cnx->query("select * from type where id_type='".$a."'")->fetch(PDO::FETCH_OBJ);
        echo $req->qte;

 $cnx->exec("insert into ticke_type(id_ticket,id_type,qte) values('".$this->id_ticket."', '".$a."', '".$req->qte."')");

    }

$this->redirect("index.php?controller=ticket&action=liste");
}

//methode de selection
public function liste($cnx){
$resultat =$cnx->query("select * from ticket")->fetchAll(PDO::FETCH_OBJ);
return $resultat;
}
//methode de selection whre id 
public function listWhereId($cnx){
$resultat =$cnx->query("select * from ticket where id_ticket='".$this->id_ticket."'")->fetch(PDO::FETCH_OBJ);
	 
return $resultat;
}
//methode de edit
public function edit($cnx){
$cnx->exec("update ticket set nom= '".$this->nom."',description= '".$this->description."',date= '".$this->date."',id_categorie= '".$this->id_categorie."',place= '".$this->place."',ville= '".$this->ville."',photo= '".$this->photo."' where id_ticket='".$this->id_ticket."'");
$this->redirect("index.php?controller=ticket&action=liste");

}
//methode de delete
public function delete($cnx){
$cnx->exec("delete from ticket where id_ticket='".$this->id_ticket."'");
$this->redirect("index.php?controller=ticket&action=liste");

}

    public function selectTypeTicket($cnx){
      $resultat= $cnx->query("select * from ticke_type where id_ticket='".$this->id_ticket."'")->fetchAll(PDO::FETCH_OBJ);
      return $resultat;
    }



    public function add_panier($cnx,$qte){
//        unset($_SESSION['panier']);
//        exit;
        $tik=$this->listWhereId($cnx);
//        echo $tik->nom;

        $typeTicks=$this->selectTypeTicket($cnx);

        foreach ( $typeTicks as $a){
//            echo $a->id_type." ";
            $req= $cnx->query("select * from type where id_type='".$a->id_type."'")->fetch(PDO::FETCH_OBJ);
//            echo $req->nom." ";
//            echo $req->prixu." ";

//            echo "<br> --------------------<br>";
//            echo $a->id_ticket." <br>";
//            echo $a->id_type." <br>";
//            echo " <br>--------------------<br>";
//
            $_SESSION['panier'][$a->id_ticket][$a->id_type]['nomTicket']=$tik->nom;
            $_SESSION['panier'][$a->id_ticket][$a->id_type]['qte']=$qte;
            $_SESSION['panier'][$a->id_ticket][$a->id_type]['prixu']=$req->prixu;
            $_SESSION['panier'][$a->id_ticket][$a->id_type]['nomType']=$req->nom;
            $_SESSION['panier'][$a->id_ticket][$a->id_type]['photo']=$tik->photo;
            $_SESSION['panier'][$a->id_ticket][$a->id_type]['id_ticket']=$tik->id_ticket;
            $_SESSION['panier'][$a->id_ticket][$a->id_type]['id_type']=$a->id_type;
            $_SESSION['panier'][$a->id_ticket][$a->id_type]['id']=$a->id;
           // print_r( $_SESSION['panier']);

        }
        //print_r( $_SESSION['panier']);
//        echo " <br>--------------------<br>";
//      print_r( $_SESSION['panier'][4][2]['prixu']);
//
//exit;
        $this->redirect("ecommerce.php?controller=ticket&action=liste_panier");

    }

    public function tot_panier($cnx){
        $total=0;


        $a =$cnx->query("select * from ticket ")->fetchAll(PDO::FETCH_OBJ);
        $b =$cnx->query("select * from type ")->fetchAll(PDO::FETCH_OBJ);

        if(isset($_SESSION['panier'])){





            foreach ( $a as $aa){
                foreach ( $b as $bb){

                    if(isset($_SESSION['panier'][$aa->id_ticket][$bb->id_type])){

                       $total+=$_SESSION['panier'][$aa->id_ticket][$bb->id_type]['qte']*$_SESSION['panier'][$aa->id_ticket][$bb->id_type]['prixu'];

        }
            }
        }


    }
        return $total;
    }




    public function del_panier(){
        unset($_SESSION['panier'][$this->id_ticket]);
        $this->redirect("ecommerce.php?controller=ticket&action=liste_panier");

    }


    public function vider_panier(){
        unset($_SESSION['panier']);
        $this->redirect("ecommerce.php?controller=ticket&action=liste_panier");
    }
//methode de liste panier
    public function liste_panier(){
        return $_SESSION['panier'];
    }


    public function serach($cnx,$idcat,$datecat){

        $resultat =$cnx->query("select * from ticket where id_categorie='".$idcat."' and date >='".$datecat."'")->fetchAll(PDO::FETCH_OBJ);

      //  print_r($resultat);

        return $resultat;

    }



}

?>
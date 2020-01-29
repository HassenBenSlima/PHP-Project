<?php
class type extends fonctions{
//initialisation des attributs de l’objet voiture
private $id_type;
private $nom;
private $prixu;
private $qte;


//constructeur
    public function __construct1($id_type,$nom,$prixu,$qte)
    {
        $this->id_type=$id_type;
        $this->nom=$nom;
        $this->prixu=$prixu;
        $this->qte=$qte;
    }

    public function __construct2($id_type,$nom)
    {
        $this->id_type=$id_type;
        $this->nom=$nom;
    }




//methode d'ajout
public function ajout($cnx){


    $cnx->exec("insert into type(nom,prixu,qte) values(  '".$this->nom."','".$this->prixu."','".$this->qte."')");

$this->redirect("index.php?controller=type&action=liste");
}

//methode de selection
public function liste($cnx){
$resultat =$cnx->query("select * from type")->fetchAll(PDO::FETCH_OBJ);
return $resultat;
}
//methode de selection whre id 
public function listWhereId($cnx){
$resultat =$cnx->query("select * from type where id_type='".$this->id_type."'")->fetch(PDO::FETCH_OBJ);
	 
return $resultat;
}
//methode de edit
public function edit($cnx){
$cnx->exec("update type set nom= '".$this->nom."',prixu= '".$this->prixu."',qte= '".$this->qte."' where id_type='".$this->id_type."'");
$this->redirect("index.php?controller=type&action=liste");

}
//methode de delete
public function delete($cnx){
$cnx->exec("delete from type where id_type='".$this->id_type."'");
$this->redirect("index.php?controller=type&action=liste");

}


}

?>
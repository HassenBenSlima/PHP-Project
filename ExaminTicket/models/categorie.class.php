<?php
class categorie extends fonctions{
//initialisation des attributs de l’objet voiture
private $id_categorie;
private $nom;

//constructeur
public function __construct($id_categorie,$nom)
{
	$this->id_categorie=$id_categorie;
	$this->nom=$nom;
}

//methode d'ajout
public function ajout($cnx){
$cnx->exec("insert into categorie(nom) values(  '".$this->nom."')");
$this->redirect("index.php?controller=categorie&action=liste");
}

//methode de selection
public function liste($cnx){
$resultat =$cnx->query("select * from categorie")->fetchAll(PDO::FETCH_OBJ);
return $resultat;
}
//methode de selection whre id 
public function listWhereId($cnx){
$resultat =$cnx->query("select * from categorie where id_categorie='".$this->id_categorie."'")->fetch(PDO::FETCH_OBJ);
	 
return $resultat;
}
//methode de edit
public function edit($cnx){
$cnx->exec("update categorie set nom= '".$this->nom."' where id_categorie='".$this->id_categorie."'");
$this->redirect("index.php?controller=categorie&action=liste");

}
//methode de delete
public function delete($cnx){
$cnx->exec("delete from categorie where id_categorie='".$this->id_categorie."'");
$this->redirect("index.php?controller=categorie&action=liste");

}
}

?>
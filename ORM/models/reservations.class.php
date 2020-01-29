<?php

//initialisation des attributs de l’objet
    class reservations  extends fonctions 
 { private $id_reserv; 
private $date_debut; 
private $date_fin; 
private $prix_reserv; 
private $nom_clt; 
private $prenom_clt; 
private $cin_clt; 
private $id_voit; 

//récuperation des valeurs des attributs de l’objet voiture

//Constructeur
public function __construct($id_reserv,$date_debut,$date_fin,$prix_reserv,$nom_clt,$prenom_clt,$cin_clt,$id_voit) 
{$this->id_reserv=$id_reserv;
        $this->date_debut=$date_debut;
        $this->date_fin=$date_fin;
        $this->prix_reserv=$prix_reserv;
        $this->nom_clt=$nom_clt;
        $this->prenom_clt=$prenom_clt;
        $this->cin_clt=$cin_clt;
        $this->id_voit=$id_voit;
        }
    public function add($cnx){
    
    $cnx->exec("insert intoreservations(id_reserv,date_debut,date_fin,prix_reserv,nom_clt,prenom_clt,cin_clt,id_voit) values ('".$this->id_reserv."','".$this->date_debut."','".$this->date_fin."','".$this->prix_reserv."','".$this->nom_clt."','".$this->prenom_clt."','".$this->cin_clt."','".$this->id_voit."')");
    $this->redirect("index.php?controllers=reservations&actions=liste"); 
 }
    public function update($cnx){
    
    $cnx->exec("update reservations set id_reserv = '".$this->id_reserv."',date_debut = '".$this->date_debut."',date_fin = '".$this->date_fin."',prix_reserv = '".$this->prix_reserv."',nom_clt = '".$this->nom_clt."',prenom_clt = '".$this->prenom_clt."',cin_clt = '".$this->cin_clt."',id_voit = '".$this->id_voit."' where id_reserv='". $this->id_reserv."'");
parent::redirect("index.php?controllers=reservations&actions=liste"); 
 }

    public function delete($cnx){
    
    $cnx->exec("delete from reservations where id_reserv='". $this->id_reserv."'");
parent::redirect("index.php?controllers=reservations&actions=liste"); 
 }

    public function view($cnx){
    
    $resultat=$cnx->query("select * from reservations where id_reserv='". $this->id_reserv."'")->fetch(PDO::FETCH_OBJ);
return $resultat; 
 }

    public function liste($cnx){
    
    $resultat=$cnx->query("select * from reservations" )->fetchAll(PDO::FETCH_OBJ);
return $resultat; 
 }
} 
   ?>
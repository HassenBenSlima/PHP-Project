<?php

//initialisation des attributs de l’objet
    class voitures  extends fonctions 
 { private $id_voit; 
private $nom_voit; 
private $photo_voit; 
private $marque_voit; 
private $couleur_voit; 

//récuperation des valeurs des attributs de l’objet voiture

//Constructeur
public function __construct($id_voit,$nom_voit,$photo_voit,$marque_voit,$couleur_voit) 
{$this->id_voit=$id_voit;
        $this->nom_voit=$nom_voit;
        $this->photo_voit=$photo_voit;
        $this->marque_voit=$marque_voit;
        $this->couleur_voit=$couleur_voit;
        }
    public function add($cnx){
    
    $cnx->exec("insert intovoitures(id_voit,nom_voit,photo_voit,marque_voit,couleur_voit) values ('".$this->id_voit."','".$this->nom_voit."','".$this->photo_voit."','".$this->marque_voit."','".$this->couleur_voit."')");
    $this->redirect("index.php?controllers=voitures&actions=liste"); 
 }
    public function update($cnx){
    
    $cnx->exec("update voitures set id_voit = '".$this->id_voit."',nom_voit = '".$this->nom_voit."',photo_voit = '".$this->photo_voit."',marque_voit = '".$this->marque_voit."',couleur_voit = '".$this->couleur_voit."' where id_voit='". $this->id_voit."'");
parent::redirect("index.php?controllers=voitures&actions=liste"); 
 }

    public function delete($cnx){
    
    $cnx->exec("delete from voitures where id_voit='". $this->id_voit."'");
parent::redirect("index.php?controllers=voitures&actions=liste"); 
 }

    public function view($cnx){
    
    $resultat=$cnx->query("select * from voitures where id_voit='". $this->id_voit."'")->fetch(PDO::FETCH_OBJ);
return $resultat; 
 }

    public function liste($cnx){
    
    $resultat=$cnx->query("select * from voitures" )->fetchAll(PDO::FETCH_OBJ);
return $resultat; 
 }
} 
   ?>
<?php

//initialisation des attributs de l’objet
    class marque  extends fonctions 
 { private $id_marque; 
private $design_marque; 

//récuperation des valeurs des attributs de l’objet voiture

//Constructeur
public function __construct($id_marque,$design_marque) 
{$this->id_marque=$id_marque;
        $this->design_marque=$design_marque;
        }
    public function add($cnx){
    
    $cnx->exec("insert intomarque(id_marque,design_marque) values ('".$this->id_marque."','".$this->design_marque."')");
    $this->redirect("index.php?controllers=marque&actions=liste"); 
 }
    public function update($cnx){
    
    $cnx->exec("update marque set id_marque = '".$this->id_marque."',design_marque = '".$this->design_marque."' where id_marque='". $this->id_marque."'");
parent::redirect("index.php?controllers=marque&actions=liste"); 
 }

    public function delete($cnx){
    
    $cnx->exec("delete from marque where id_marque='". $this->id_marque."'");
parent::redirect("index.php?controllers=marque&actions=liste"); 
 }

    public function view($cnx){
    
    $resultat=$cnx->query("select * from marque where id_marque='". $this->id_marque."'")->fetch(PDO::FETCH_OBJ);
return $resultat; 
 }

    public function liste($cnx){
    
    $resultat=$cnx->query("select * from marque" )->fetchAll(PDO::FETCH_OBJ);
return $resultat; 
 }
} 
   ?>
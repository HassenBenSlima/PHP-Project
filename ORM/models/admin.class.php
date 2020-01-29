<?php

//initialisation des attributs de l’objet
    class admin  extends fonctions 
 { private $login; 
private $pass; 

//récuperation des valeurs des attributs de l’objet voiture

//Constructeur
public function __construct($login,$pass) 
{$this->login=$login;
        $this->pass=$pass;
        }
    public function add($cnx){
    
    $cnx->exec("insert intoadmin(login,pass) values ('".$this->login."','".$this->pass."')");
    $this->redirect("index.php?controllers=admin&actions=liste"); 
 }
    public function update($cnx){
    
    $cnx->exec("update admin set login = '".$this->login."',pass = '".$this->pass."' where login='". $this->login."'");
parent::redirect("index.php?controllers=admin&actions=liste"); 
 }

    public function delete($cnx){
    
    $cnx->exec("delete from admin where login='". $this->login."'");
parent::redirect("index.php?controllers=admin&actions=liste"); 
 }

    public function view($cnx){
    
    $resultat=$cnx->query("select * from admin where login='". $this->login."'")->fetch(PDO::FETCH_OBJ);
return $resultat; 
 }

    public function liste($cnx){
    
    $resultat=$cnx->query("select * from admin" )->fetchAll(PDO::FETCH_OBJ);
return $resultat; 
 }
} 
   ?>
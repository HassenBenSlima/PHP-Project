<?php
class admin extends fonctions{
//initialisation des attributs de l’objet voiture
private $id;
private $login;
private $pass;
private $nom;

//constructeur
public function __construct($id,$login,$pass,$nom)
{
	$this->id=$id;
	$this->login=$login;
	$this->pass=$pass;
	$this->nom=$nom;
}

//methode d'ajout
public function ajout($cnx){

    $this->pass=md5(sha1($this->pass));

    $req=$cnx->query("select * from admin where login='".$this->login."' and pass='".$this->pass."'");
    $verif=$req->rowCount();

        if($verif==1)
        {
            $_SESSION['email']=$this->login;
            $_SESSION['motDePasse']=$this->pass;

            echo "<script>alert('Email déja utulisé');</script>";

        }else{

            $cnx->exec("insert into admin(login,pass,nom) values( '".$this->login."', '".$this->pass."', '".$this->nom."')");
            $this->redirect("index.php?controller=admin&action=liste");

        }

}

//methode de selection
public function liste($cnx){
$resultat =$cnx->query("select * from admin")->fetchAll(PDO::FETCH_OBJ);
return $resultat;
}
//methode de selection whre id 
public function listWhereId($cnx){
$resultat =$cnx->query("select * from admin where id='".$this->id."'")->fetch(PDO::FETCH_OBJ);
	 
return $resultat;
}
//methode de edit
public function edit($cnx){
$cnx->exec("update admin set login= '".$this->login."',pass= '".$this->pass."',nom= '".$this->nom."' where id='".$this->id."'");
$this->redirect("index.php?controller=admin&action=liste");

}
//methode de delete
public function delete($cnx){
$cnx->exec("delete from admin where id='".$this->id."'");
$this->redirect("index.php?controller=admin&action=liste");

}

//methode login
public function login($cnx){
    $this->pass=md5(sha1($this->pass));
    $req=$cnx->query("select * from admin where login='".$this->login."' and pass='".$this->pass."'");
    $verif=$req->rowCount();
    if($verif==1)
    {
        $_SESSION['email']=$this->login;
        $_SESSION['motDePasse']=$this->pass;
        $this->redirect("index.php");
    }else
        $this->redirect("loginadmin.php");
}

//methode logout
public function logout(){
    $this->redirect("loginadmin.php");
}


}

?>
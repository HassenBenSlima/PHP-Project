<?php
class client extends fonctions{
//initialisation des attributs de l’objet voiture
private $id_client;
private $nom;
private $prenom;
private $email;
private $motDePasse;
private $contact;

//constructeur
public function __construct($id_client,$nom,$prenom,$email,$motDePasse,$contact)
{
	$this->id_client=$id_client;
	$this->nom=$nom;
	$this->prenom=$prenom;
	$this->email=$email;
	$this->motDePasse=$motDePasse;
	$this->contact=$contact;
}

//methode d'ajout

    public function ajout($cnx){

        $this->motDePasse=md5($this->motDePasse);

        $req=$cnx->query("select * from client where email='".$this->email."'");
        $verif=$req->rowCount();

        if($verif==1)
        {
            $_SESSION['email']=$this->email;
            $_SESSION['motDePasse']=$this->motDePasse;

            echo "<script>alert('Email déja utilisé');</script>";


        }else{

            $cnx->exec("insert into client(nom,prenom,email,motDePasse,contact) values('".$this->nom."', '".$this->prenom."', '".$this->email."', '".$this->motDePasse."', '".$this->contact."')");

            $this->redirect("ecommerce.php");

        }




    }


//methode de selection
public function liste($cnx){
$resultat =$cnx->query("select * from client")->fetchAll(PDO::FETCH_OBJ);
return $resultat;
}
//methode de selection whre id 
public function listWhereId($cnx){
$resultat =$cnx->query("select * from client where id_client='".$this->id_client."'")->fetch(PDO::FETCH_OBJ);
	 
return $resultat;
}
//methode de edit
public function edit($cnx){
$cnx->exec("update client set nom= '".$this->nom."',prenom= '".$this->prenom."',email= '".$this->email."',motDePasse= '".$this->motDePasse."',contact= '".$this->contact."' where id_client='".$this->id_client."'");
$this->redirect("index.php?controller=client&action=liste");

}
//methode de delete
public function delete($cnx){
$cnx->exec("delete from client where id_client='".$this->id_client."'");
$this->redirect("index.php?controller=client&action=liste");

}

//methode login
    public function login($cnx){
        $this->motDePasse=md5($this->motDePasse);

        $req=$cnx->query("select * from client where email='".$this->email."' and motDePasse='".$this->motDePasse."'");

        $r=$cnx->query("select * from client where email='".$this->email."' and motDePasse='".$this->motDePasse."'")->fetch(PDO::FETCH_OBJ);
        $_SESSION['id_client']=$r->id_client;

        $verif=$req->rowCount();

        if($verif==1)
        {
            $_SESSION['email']=$this->email;
            $_SESSION['motDePasse']=$this->motDePasse;

            $this->redirect("ecommerce.php");

        }else
            $this->redirect("login.php");
    }

    //methode logout
    public function logout(){
        $this->redirect("login.php");
    }


}

?>



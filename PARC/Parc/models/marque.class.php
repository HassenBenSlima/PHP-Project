<?php
class marque 
{
	private $id_marque;
	private $design_marque;
	
	public function __construct($id_marque,$design_marque)
	{
		$this->id_marque=$id_marque;
		$this->design_marque=$design_marque;
	}
	
	//methode d'ajout
	public function add_marque($cnx){
		$cnx->exec("insert into marque (design_marque) values('".$this->design_marque."')");
	header("location:index.php?controller=marque&action=list_marque");
	}
	
	//methode liste marque
	public function list_marque($cnx){
		$resultat =$cnx->query("select * from marque")->fetchAll(PDO::FETCH_OBJ); 
	return $resultat;
	}
	
	//methode detail voiture
	public function view_marque($cnx){
		$resultat =$cnx->query("select * from marque where id_marque='".$this->id_marque."'")->fetch(PDO::FETCH_OBJ); 
	return $resultat;
	}
	
	//methode de modification
	public function edit_marque($cnx){
		$cnx->exec("update marque set design_marque='".$this->design_marque."' where id_marque='".$this->id_marque."'");
	header("location:index.php?controller=marque&action=list_marque");
	}
	
	//methode de suppression
	public function delete_marque($cnx){
		$cnx->exec("delete from marque where id_marque='".$this->id_marque."'");
	header("location:index.php?controller=marque&action=list_marque");
	}
	
	
}
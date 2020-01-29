<?php
class voitures 
{
	private $id_voit;
	private $nom_voit;
	private $photo_voit;
	private $marque_voit;
	private $couleur_voit;
	
	public function __construct($id_voit,$nom_voit,$photo_voit,$marque_voit,$couleur_voit)
	{
		$this->id_voit=$id_voit;
		$this->nom_voit=$nom_voit;
		$this->photo_voit=$photo_voit;
		$this->marque_voit=$marque_voit;
		$this->couleur_voit=$couleur_voit;
	}
	
	//methode d'ajout
	public function add_voit($cnx){
		$cnx->exec("insert into voitures (nom_voit,photo_voit,marque_voit,couleur_voit) values('".$this->nom_voit."','".$this->photo_voit."','".$this->marque_voit."','".$this->couleur_voit."')");
	header("location:index.php?controller=voitures&action=list_voit");
	}
	
	//methode liste voitures
	public function list_voit($cnx){
		$resultat =$cnx->query("select * from voitures v,marque m where v.marque_voit=m.id_marque")->fetchAll(PDO::FETCH_OBJ); 
	return $resultat;
	}
	
	//methode detail voiture
	public function view_voit($cnx){
		$resultat =$cnx->query("select * from voitures where id_voit='".$this->id_voit."'")->fetch(PDO::FETCH_OBJ); 
	return $resultat;
	}
	
	//methode de modification
	public function edit_voit($cnx){
		$cnx->exec("update voitures set nom_voit='".$this->nom_voit."',photo_voit='".$this->photo_voit."',marque_voit='".$this->marque_voit."',couleur_voit='".$this->couleur_voit."' where id_voit='".$this->id_voit."'");
	header("location:index.php?controller=voitures&action=list_voit");
	}
	
	//methode de suppression
	public function delete_voit($cnx){
		$cnx->exec("delete from voitures where id_voit='".$this->id_voit."'");
	header("location:index.php?controller=voitures&action=list_voit");
	}
	
	
}
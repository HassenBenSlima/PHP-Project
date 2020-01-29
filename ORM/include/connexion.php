<?php
$db_name="parc";
$cnx= new PDO('mysql:host=localhost;dbname='.$db_name, 'root', '');
//ajouter cette instruction pour permettre l’affichage des messages d’erreurs
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>
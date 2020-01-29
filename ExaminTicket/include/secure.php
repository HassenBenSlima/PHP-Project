<?php
if(!isset($_SESSION['email']) || !isset($_SESSION['motDePasse'])){
echo "<script>window.location.href='login.php';</script>";
exit();
}
?>
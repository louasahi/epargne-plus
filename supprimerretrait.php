<?php
require_once ("session.php");
require_once ("connexion.php");	

if (isset($_GET['idretrait'])) 
	
   $idretrait = $_GET['idretrait'];
	


$ps=$pdo->prepare("DELETE FROM retrait WHERE idretrait=?");
$params=array($idretrait);
$ps->execute($params);
header("location:retrait.php");
?>
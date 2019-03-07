<?php
require_once ("session.php");
require_once ("connexion.php");	

if (isset($_GET['iddepot'])) 
	{
   $iddepot = $_GET['iddepot'];
}


$ps=$pdo->prepare("DELETE FROM depot WHERE iddepot=?");
$params=array($iddepot);
$ps->execute($params);
header("location:depot.php");
?>
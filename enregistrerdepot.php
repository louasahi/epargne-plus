<?php
require_once ("session.php");

if (isset($_POST['montantdepot']))
	{
   $montantdepot = $_POST['montantdepot'];
}
if (isset($_POST['datedepot']))
	{
   $datedepot = $_POST['datedepot'];
}
if (isset($_POST['id']))
	{
   $id = $_POST['id'];
}



require_once("connexion.php");
$ps=$pdo->prepare("INSERT INTO depot(montantdepot,datedepot,id) VALUES (?,?,?)");
$params=array($montantdepot,$datedepot,$id);
$ps->execute($params);
header("location:depot.php");

?>

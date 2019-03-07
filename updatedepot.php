<?php
require_once ("session.php");	
$iddepot=$_POST['iddepot'];
$montantdepot=$_POST['montantdepot'];
$datedepot=$_POST['datedepot'];
$id=$_POST['id'];

require_once("connexion.php");
$ps=$pdo->prepare("UPDATE depot SET montantdepot=?, datedepot=?, id=? WHERE iddepot=?");
$params=array($montantdepot,$datedepot,$id,$iddepot);
$ps->execute($params);
header("location:depot.php");

?>
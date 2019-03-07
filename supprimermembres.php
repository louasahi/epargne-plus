<?php
require_once ("session.php");	
require_once ("connexion.php");
$id=$_GET['id'];

$requetdepot="select count(*) countdepot from depot where id=$id";
$resultatdepot=$pdo->query($requetdepot);
$tabcountdepot=$resultatdepot->fetch();
$nbredepot=$tabcountdepot['countdepot'];

$requetretrait="select count(*) countretrait from retrait where id=$id";
$resultatretrait=$pdo->query($requetretrait);
$tabcountretrait=$resultatretrait->fetch();
$nbreretrait=$tabcountretrait['countretrait'];

if (($nbredepot==0) && ($nbreretrait==0))
{
$ps=$pdo->prepare("DELETE FROM membres WHERE id=?");
$params=array($id);
$ps->execute($params);
header("location:membres.php");
}

else{
	$msg="Impossible de supprimer ce membre";
	header("location:alerte.php?message=$msg");
	}
?>
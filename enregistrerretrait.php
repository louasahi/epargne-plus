<?php
require_once ("session.php");
require_once("connexion.php");

if (isset($_POST['montantretrait']))
	{
   $montantretrait = $_POST['montantretrait'];
}
if (isset($_POST['dateretrait']))
	{
   $dateretrait = $_POST['dateretrait'];
}
if (isset($_POST['id']))
	{
   $id = $_POST['id'];
}

$req="SELECT SUM( montantdepot)as soldedepot
FROM depot,membres
WHERE membres.id=depot.id
AND membres.id=$id";

$resultat=$pdo->query($req);
$tabcount=$resultat->fetch();
$sommedepot=$tabcount['soldedepot'];

if($sommedepot >= $montantretrait)
{
$ps=$pdo->prepare("INSERT INTO retrait(montantretrait,dateretrait,id) VALUES (?,?,?)");
$params=array($montantretrait,$dateretrait,$id);
$ps->execute($params);
header("location:retrait.php");
}
else
{
	$msg="Retrait Impossible!!! Vérifier votre solde";
	header("location:alerteretrait.php?message=$msg");
}
?>

<?php
require_once ("session.php");
require_once("connexion.php");

$idretrait=$_POST['idretrait'];
$montantretrait=$_POST['montantretrait'];
$dateretrait=$_POST['dateretrait'];
$id=$_POST['id'];

$req="SELECT SUM( montantdepot)as soldedepot
FROM depot,membres
WHERE membres.id=depot.id
AND membres.id=$id";

$resultat=$pdo->query($req);
$tabcount=$resultat->fetch();
$sommedepot=$tabcount['soldedepot'];

if($sommedepot >= $montantretrait)
{
$ps=$pdo->prepare("UPDATE retrait SET montantretrait=?, dateretrait=?, id=? WHERE idretrait=?");
$params=array($montantretrait,$dateretrait,$id,$idretrait);
$ps->execute($params);
header("location:retrait.php");
}
else
{
	$msg="Retrait Impossible!!! Vérifier votre solde";
	header("location:alerteretrait.php?message=$msg");
}
?>

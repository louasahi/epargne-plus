<?php
require_once ("session.php");	
$id=$_POST['id'];
$nom=$_POST['nom'];
$email=$_POST['email'];
$telephone=$_POST['telephone'];
$login=$_POST['login'];
$password=$_POST['password'];
$role=$_POST['role'];

require_once("connexion.php");
$ps=$pdo->prepare("UPDATE membres SET nom=?, email=?, telephone=?, login=?, password=?, role=? WHERE id=?");
$params=array($nom,$email,$telephone,$login,$password,$role,$id);
$ps->execute($params);
header("location:membres.php");

?>
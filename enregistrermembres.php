<?php
require_once ("session.php");
if((isset($_POST['nom'])) && (!empty($_POST['nom'])))
{
   $nom = $_POST['nom'];
}
if((isset($_POST['email'])) && (!empty($_POST['email'])))
	{
   $email = $_POST['email'];
}
if((isset($_POST['telephone'])) && (!empty($_POST['telephone'])))
	{
   $telephone = $_POST['telephone'];
}
if((isset($_POST['login'])) && (!empty($_POST['login'])))
  {
	  $login = $_POST['login'];
}
if((isset($_POST['password'])) && (!empty($_POST['password'])))
	{
   $password = md5($_POST['password']);
}
if((isset($_POST['role'])) && (!empty($_POST['role'])))
	{
   $role = $_POST['role'];
}


require_once("connexion.php");
$ps=$pdo->prepare("INSERT INTO membres(nom,email,telephone,login,password,role) VALUES (?,?,?,?,?,?)");
$params=array($nom,$email,$telephone,$login,$password,$role);
$ps->execute($params);

header("location:membres.php");
?>

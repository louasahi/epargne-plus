<?php
session_start();

require_once ("connexion.php");

$login=isset($_POST['login'])?$_POST['login']:"";
$password=md5($_POST['password'])?md5($_POST['password']):"";

$requete="SELECT * FROM membres WHERE login='$login' AND password='$password'";
$resultat=$pdo->query($requete);

if($utilisateur=$resultat->fetch())
{
		$_SESSION['user']=$utilisateur;
			if($_SESSION['user']['role']=='user')

				header("location:membre.php");

		else

			 header("location:membres.php");

}
	else
	{
		$_SESSION['erreurlogin']="<strong>Erreur!!!</strong>&nbsp;&nbsp;Login ou mot de passe incorrecte";
			header("location:login.php");
	}
?>

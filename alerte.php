  <?php 
			$message=isset($_GET['message'])?$_GET['message']:"Erreur";
  ?>
 
 <!DOCTYPE html>
<html>

<head> 

 <title></title>
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
 <link href="bootstrap/css/authentification.css" rel="stylesheet" type="text/css">?
 </head> 

 <body>
 
 <?php require_once ("menuadmin.php"); ?>
 
 <div class="container marge">
 
	<div class="panel panel-danger">
		<div class="panel-heading"> <h5>ERREUR!!!</h5></div>
			<div class="panel-body">
				<h3><?php echo $message	?></h3>
				<h4><a href="<?php echo $_SERVER['HTTP_REFERER']?> "> <<< Retour </a></h4>
			</div>
	</div>
 </div>
 </body> 

 </html>
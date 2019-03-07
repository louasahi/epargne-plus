<?php
session_start();
if(isset($_SESSION['erreurlogin']))
	$erreurlogin=$_SESSION['erreurlogin'];
else
	$erreurlogin="";
session_destroy();
 ?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8"/>
	 <title></title>
 		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
 		<link href="bootstrap/css/authentification.css" rel="stylesheet" type="text/css">
</head>

 <body>
 <?php require_once ("menuadmin.php"); ?>

 <div class="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 marge">

 		<div class="panel panel-primary ">
 			<div class="panel-heading"> <h3>Authentification</h3></div>
 				<div class="panel-body">

 					<form method="post" action="seconnecter.php" class="form">
 						<?php if(!empty($erreurlogin)) {?>

 						<div class="alert alert-danger">
 					  <?php
						echo $erreurlogin;
 						?>
 	 				</div>
 		 			<?php }  ?>

 	 <div class="form-group">
 	 	<label class="control-label"> LOGIN </label>
 		<input type="text" name="login" class="form-control"/>
 	</div>

 	<div class="form-group">
 		<label class="control-label"> MOT DE PASSE </label>
 		<input type="password" name="password" class="form-control"/>
 	</div>

 	<div >
 		<button type="submit" class="btn btn-success">
 			<span class="glyphicon glyphicon-log-in">  </span>
 				Se Connecter
		</button>
 </div>
 			</form>
 		</div>
 	</div>
 </div>

 </body>

 </html>

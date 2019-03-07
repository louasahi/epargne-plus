<?php
require_once ("session.php");
require_once ("connexion.php");

$req= "SELECT nom,email,telephone,login,SUM( montantdepot-montantretrait) as solde
FROM depot,retrait,membres
WHERE membres.id=depot.id
AND membres.id=retrait.id
AND membres.id={$_SESSION['user']['id']}";

$ps=$pdo->prepare($req);
$ps->execute();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
 <link href="bootstrap/css/style.css" rel="stylesheet" type="text/css">?
 </head>

 				<body>
 <?php require_once ("menuadmin.php"); ?>

 <div class="container espace">

 		<div class="panel panel-primary">
 			<div class="panel-heading"> <h4>INFOS SOLDES</h4></div>
 				<div class="panel-body">

 					<table class="table table-bordered">
						<thead>
							<tr>
									  <th>NOM ET PRENOMS</th>
                 	  <th>EMAIL</th>
                 		<th>TELEPHONE</th>
                 		<th>LOGIN</th>
										<th>SOLDE (F.cfa)</th>
							</tr>
						</thead>

 <tbody>
	 		<?php while($soldeuser= $ps->fetch()) {?>
							<tr>
								<td> <?php echo ($soldeuser['nom']) ?> </td>
            		<td> <?php echo ($soldeuser['email']) ?> </td>
            		<td> <?php echo ($soldeuser['telephone']) ?> </td>
            		<td> <?php echo ($soldeuser['login']) ?> </td>
								<td> <?php echo ($soldeuser['solde']) ?> </td>
							</tr>
				<?php } ?>
	</tbody>
				</table>


 </div>
 				</div>
 		</div>


 					</body>

 </html>

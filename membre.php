<?php

require_once ("session.php");
require_once ("connexion.php");

	$req= "SELECT * FROM membres WHERE id={$_SESSION['user']['id']}";

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
 		<div class="panel-heading"> <h4>VOS INFOS PERSONNELLES</h4></div>
 			<div class="panel-body">

 				<table class="table table-bordered">

     			<thead>

           		<tr>
                <th>     ID         </th>
                 <th> NOM ET PRENOMS</th>
                 <th>    EMAIL       </th>
                 <th>   TELEPHONE    </th>
                 <th>     LOGIN       </th>
<th><a href="ajoutermembres" class="btn btn-primary" role="button" disabled="disabled">
<span class ="glyphicon glyphicon-plus"></span> Nouveau Membre</a></th>
 						</tr>

      	</thead>

 			<tbody>

				<?php while($membre = $ps->fetch()) {?>
					<tr>
						<td> <?php echo ($membre['id']) ?> 	</td>
            <td> <?php echo ($membre['nom']) ?> 	</td>
            <td> <?php echo ($membre['email']) ?></td>
            <td> <?php echo ($membre['telephone']) ?></td>
            <td> <?php echo ($membre['login']) ?> 		</td>
						<td>
<a href="modifiermembres.php?id=<?php echo ($membre['id']) ?>" class="btn btn-success" role="button" disabled="disabled">
<span class ="glyphicon glyphicon-edit"></span> Modifier </a>
<a onclick="return confirm('Êtes Vous Sûre ...?');" href="supprimermembres.php?id=<?php echo ($membre['id']) ?>" class="btn btn-danger" role="button" disabled="disabled">
<span class ="glyphicon glyphicon-trash"></span> Supprimer </a>
					  </td>
				 </tr>

			 <?php } ?>

 		 </tbody>

 			</table>


   </div>
 		</div>
 </div>


 </body>

 </html>

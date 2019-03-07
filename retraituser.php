<?php

require_once ("session.php");
require_once ("connexion.php");

	$req= "SELECT idretrait,montantretrait,dateretrait,nom
  FROM retrait,membres
  WHERE membres.id=retrait.id
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
 		<div class="panel-heading"> <h4>VOTRE HISTORIQUE DE RETRAITS</h4></div>
 			<div class="panel-body">

 				<table class="table table-bordered">

     			<thead>

           		<tr>
              <th>   ID RETRAIT         </th>
               <th> MONTANT (F.cfa)</th>
               <th>    DATE       </th>
               <th>     NOM MEMBRE      </th>
<th><a href="ajouterretrait" class="btn btn-primary" role="button" disabled="disabled">
<span class ="glyphicon glyphicon-plus"></span> Nouveau retrait</a></th>
 						</tr>

      	</thead>

 			<tbody>

        <?php while($retraituser = $ps->fetch()) {?>
        <tr>
            <td> <?php echo ($retraituser['idretrait']) ?> </td>
                  <td> <?php echo ($retraituser['montantretrait']) ?> </td>
                  <td> <?php echo ($retraituser['dateretrait']) ?> </td>
                   <td> <?php echo ($retraituser['nom']) ?> </td>
            <td>
<a href="modifierdepot.php?id=<?php echo ($retraituser['idretrait']) ?>" class="btn btn-success" role="button" disabled="disabled">
<span class ="glyphicon glyphicon-edit"></span> Modifier </a>
<a onclick="return confirm('Êtes Vous Sûre ...?');" href="supprimermembres.php?id=<?php echo ($retraituser['idretrait']) ?>" class="btn btn-danger" role="button" disabled="disabled">
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

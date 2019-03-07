<?php

require_once ("session.php");
require_once ("connexion.php");

	$req= "SELECT iddepot,montantdepot,datedepot,nom
  FROM depot,membres
  WHERE membres.id=depot.id
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
 		<div class="panel-heading"> <h4>VOTRE HISTORIQUE DE DEPOTS</h4></div>
 			<div class="panel-body">

 				<table class="table table-bordered">

     			<thead>

           		<tr>
              <th>   ID DEPOT         </th>
               <th> MONTANT (F.cfa)</th>
               <th>    DATE       </th>
               <th>     NOM MEMBRE      </th>
<th><a href="ajouterdepot" class="btn btn-primary" role="button" disabled="disabled">
<span class ="glyphicon glyphicon-plus"></span> Nouveau depot</a></th>
 						</tr>

      	</thead>

 			<tbody>

        <?php while($depotuser = $ps->fetch()) {?>
        <tr>
            <td> <?php echo ($depotuser['iddepot']) ?> </td>
                  <td> <?php echo ($depotuser['montantdepot']) ?> </td>
                  <td> <?php echo ($depotuser['datedepot']) ?> </td>
                   <td> <?php echo ($depotuser['nom']) ?> </td>
            <td>
<a href="modifierdepot.php?id=<?php echo ($depotuser['iddepot']) ?>" class="btn btn-success" role="button" disabled="disabled">
<span class ="glyphicon glyphicon-edit"></span> Modifier </a>
<a onclick="return confirm('Êtes Vous Sûre ...?');" href="supprimermembres.php?id=<?php echo ($depotuser['iddepot']) ?>" class="btn btn-danger" role="button" disabled="disabled">
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

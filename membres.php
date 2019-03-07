<?php

require_once ("session.php");
require_once ("connexion.php");

if($_SESSION['user']['role']!=='admin')

	header("location:membre.php");

$nommembres="";
$taille=isset($_GET['taille'])?$_GET['taille']:5;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)* $taille;

	if (isset($_GET['nommembres']))
	{ $nommembres=$_GET['nommembres'];
		$req="SELECT * FROM membres WHERE nom like '%$nommembres%'limit $taille offset $offset";
		$reqcount="SELECT count(*) as countmembres FROM membres WHERE nom like '%$nommembres%'";
	}
	else
{
	$req= "SELECT * FROM membres limit $taille offset $offset";
	$reqcount="SELECT count(*) as countmembres FROM membres";
}
	$ps=$pdo->prepare($req);
	$ps->execute();

$resultatcount=$pdo->query($reqcount);
$tabcount=$resultatcount->fetch();
$nbremembres=$tabcount['countmembres'];
$reste= $nbremembres % $taille;
if ($reste===0)
	$nbrepage= $nbremembres/$taille;
else
	$nbrepage=floor($nbremembres/$taille)+1;
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

 		<div class="panel panel-success">
 			<div class="panel-heading"> <h5>RECHERCHER...</h5></div>
 				<div class="panel-body">
 						<form method="get" action="membres.php" class="form-inline">
 								<div class="form-group">
 										<label class="control-label"> Recherche par nom: </label>
 										<input type="text" name="nommembres" class="form-control" value="<?php echo ($nommembres) ?>">
 										<button type="submit" class="btn btn-success"> <span class ="glyphicon glyphicon-search"></span> rechercher... </button>
 								</div>
						</form>
 				</div>
 		</div>

 <div class="panel panel-primary">
 		<div class="panel-heading"> <h4>LISTE DES MEMBRES</h4></div>
 			<div class="panel-body">

 				<table class="table table-bordered">

     			<thead>

           		<tr>
                <th>     ID         </th>
                 <th> NOM ET PRENOMS</th>
                 <th>    EMAIL       </th>
                 <th>   TELEPHONE    </th>
                 <th>     LOGIN       </th>
								 <th>   <a href="ajoutermembres" class="btn btn-primary" role="button"> <span class ="glyphicon glyphicon-plus"></span> Nouveau Membre</a>  </th>


           	 </tr>

      	</thead>

 			<tbody>

				<?php while($membres = $ps->fetch()) {?>
					<tr>
						<td> <?php echo ($membres['id']) ?> 	</td>
            <td> <?php echo ($membres['nom']) ?> 	</td>
            <td> <?php echo ($membres['email']) ?></td>
            <td> <?php echo ($membres['telephone']) ?></td>
            <td> <?php echo ($membres['login']) ?> 		</td>
						<td>
							<a href="modifiermembres.php?id=<?php echo ($membres['id']) ?>" class="btn btn-success" role="button"> <span class ="glyphicon glyphicon-edit"></span> Modifier </a>
							<a onclick="return confirm('Êtes Vous Sûre ...?');" href="supprimermembres.php?id=<?php echo ($membres['id']) ?>" class="btn btn-danger" role="button"> <span class ="glyphicon glyphicon-trash"></span> Supprimer </a>
					  </td>
				 </tr>

			 <?php } ?>

 		 </tbody>

 			</table>

 		<div >
 			<ul class="pagination">

				<?php for ($i=1; $i<=$nbrepage; $i++) {?>

						<li class="<?php if($page==$i) echo 'active' ?>">
						<a href="membres.php?page=<?php echo $i; ?>&nommembres=<?php echo $nommembres ?>"> <?php echo $i; ?></a>
					 </li>

				<?php } ?>

		  </ul>

   </div>
 		</div>
 </div>


 </body>

 </html>

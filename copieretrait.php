<?php
require_once ("session.php");
require_once ("connexion.php");
$date=isset($_GET['date'])?$_GET['date']:"";
$montant=isset($_GET['montant'])?$_GET['montant']:"";

$taille=isset($_GET['taille'])?$_GET['taille']:5;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)* $taille;

$req= "SELECT * FROM retrait limit $taille offset $offset";
$reqcount="SELECT count(*) as countretrait FROM retrait";

$ps=$pdo->prepare($req);
$ps->execute();

$resultatcount=$pdo->query($reqcount);
$tabcount=$resultatcount->fetch();
$nbreretrait=$tabcount['countretrait'];
$reste= $nbreretrait % $taille;
if ($reste===0)
	$nbrepage= $nbreretrait/$taille;
else
	$nbrepage=floor($nbreretrait/$taille)+1;
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head> 

 <title></title>
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
 <link href="bootstrap/css/style.css" rel="stylesheet" type="text/css">
 </head> 

 <body>
 <?php require_once ("menuadmin.php"); ?>

 <div class="container espace">
 <div class="panel panel-success">
 <div class="panel-heading"> <h5>RECHERCHER...</h5></div>
 <div class="panel-body">
 <form method="get" action="membres.php" class="form-inline">
 <div class="form-group">
 <label class="control-label"> Recherche par date: </label>
 <input type="date" name="date" class="form-control" value="<?php echo ($date) ?>">
 <label class="control-label"> Recherche par montant: </label>
 <input type="number" name="montant" class="form-control" value="<?php echo ($montant) ?>">
 <button type="submit" class="btn btn-success"> <span class ="glyphicon glyphicon-search"></span> rechercher... </button>
 </div>
</form>
 </div>
 </div>
 
 <div class="panel panel-primary">
 <div class="panel-heading"> <h4>LISTE DES RETRAITS</h4></div>
 <div class="panel-body">
 
 <table class="table table-bordered">
     
     <thead>
           
           <tr>
                <th>   ID RETRAIT         </th> 
                 <th> MONTANT</th>
                 <th>    DATE       </th>
                 
                 <th>     ID MEMBRE      </th>
				
				<th>   <a href="ajouterretrait" class="btn btn-primary" role="button"> <span class ="glyphicon glyphicon-plus"></span> Nouveau Retrait </a>  </th>
				 
                 
           </tr>
      
      </thead>
 
 <tbody>

<?php while($retrait = $ps->fetch()) {?>
	<tr>
			<td> <?php echo ($retrait['idretrait']) ?> </td>
            <td> <?php echo ($retrait['montantretrait']) ?> </td>
            <td> <?php echo ($retrait['dateretrait']) ?> </td>
             <td> <?php echo ($retrait['id']) ?> </td>
			<td> 
			<a href="modifierretrait.php?idretrait=<?php echo ($retrait['idretrait']) ?>" class="btn btn-success" role="button"> <span class ="glyphicon glyphicon-edit"></span> Modifier </a>
			<a onclick="return confirm('Êtes Vous Sûre ...?');" href="supprimerretrait.php?idretrait=<?php echo ($retrait['idretrait']) ?>" class="btn btn-danger" role="button"> <span class ="glyphicon glyphicon-trash"></span> Supprimer </a>
			</td>
	</tr>
 
<?php } ?>
 
 </tbody>
 
 </table>
 
 <div >
 <ul class="pagination">
	
	<?php for ($i=1; $i<=$nbrepage; $i++) {?>
	
	<li class="<?php if($page==$i) echo 'active' ?>"> 
	<a href="retrait.php?page=<?php echo $i; ?> "> <?php echo $i; ?></a> 
	</li>
	
	<?php } ?>
	
</ul>
 </div>
 </div>
 </div>

 
 </body> 

 </html>
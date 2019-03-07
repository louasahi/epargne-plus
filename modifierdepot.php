<?php
require_once ("session.php");
$iddepot=$_GET['iddepot'];
if (isset($_GET['id'])) { $id=$_GET['id']; }
require_once ("connexion.php");
$ps=$pdo->prepare("SELECT * FROM depot WHERE iddepot=?");
$params=array($iddepot);
$ps->execute($params);
$depot = $ps->fetch();

$req= "SELECT * FROM membres";
$ps=$pdo->prepare($req);
$ps->execute();
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8"/>
 <title></title>
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
 <link href="bootstrap/css/style.css" rel="stylesheet" type="text/css">
 </head>

 <body>
 <?php require_once ("menuadmin.php"); ?>

 <div class="container espace col-md-6 col-xs-12 col-md-offset-3 ">

 <div class="panel panel-primary">
 <div class="panel-heading"> <h3>MODIFIER UN DEPOT</h3></div>
 <div class="panel-body">

 <form method="post" action="updatedepot.php">
 <div class="form-group">
 <label class="control-label"></label>
 <input type="text" readonly="readonly" name="iddepot" value="<?php echo ($depot['iddepot'])?>" class="form-control"/>
 </div>
 <div class="form-group">
 <label class="control-label"> MONTANT </label>
 <input type="text" name="montantdepot" value="<?php echo ($depot['montantdepot'])?>" class="form-control"
 required = "required" pattern = "[0-9]+"/>
 </div>
 <div class="form-group">
 <label class="control-label"> DATE  </label>
 <input type="text" name="datedepot" value="<?php echo ($depot['datedepot'])?>" class="form-control" required = "required"/>
 </div>
 <div class="form-group">
 <label class="control-label"> NOM ET PRENOMS </label>
 <select name="id"  class="form-control"/>

 <?php while($membres = $ps->fetch()) {?>
 <option value="<?php echo ($membres['id']) ?>"
 <?php
if($depot['id']===$membres['id'])echo "selected" ?>>
 <?php echo ($membres['nom']) ?>
 </option>
 <?php } ?>

 </select>
 </div>
 <div >
 <button type="submit" class="btn btn-primary"> ENREGISTRER </button>
 </div>
 </form>
 </div>
 </div>
 </div>

 </body>

 </html>

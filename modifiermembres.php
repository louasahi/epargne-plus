<?php
require_once ("session.php");
$id=$_GET['id'];
require_once ("connexion.php");
$ps=$pdo->prepare("SELECT * FROM membres WHERE id=?");
$params=array($id);
$ps->execute($params);
$membres = $ps->fetch();
$role =$membres['role'];
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
 <div class="panel-heading"> <h3>AJOUTER UN MEMBRE</h3></div>
 <div class="panel-body">

 <form method="post" action="updatemembres.php">
 <div class="form-group">
 <label class="control-label"></label>
 <input type="hidden" name="id" value="<?php echo ($membres['id'])?>" class="form-control"/>
 </div>
 <div class="form-group">
 <label class="control-label"> NOM ET PRENOMS </label>
 <input type="text" name="nom" value="<?php echo ($membres['nom'])?>" class="form-control" required = "required"/>
 </div>
 <div class="form-group">
 <label class="control-label"> EMAIL </label>
 <input type="email" name="email" value="<?php echo ($membres['email'])?>" class="form-control" 
 required = "required" pattern = "^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}"/>
 </div>
 <div class="form-group">
 <label class="control-label"> TELEPHONE </label>
 <input type="tel" name="telephone" value="<?php echo ($membres['telephone'])?>" class="form-control"
 required = "required" pattern = "[0-9]{8}"/>
 </div>
 <div class="form-group">
 <label class="control-label"> LOGIN </label>
 <input type="text" name="login"  value="<?php echo ($membres['login'])?>" class="form-control" required = "required"/>
 </div>
 <div class="form-group">
 <label class="control-label"> MOT DE PASSE </label>
 <input type="password" name="password"  value="<?php echo ($membres['password'])?>" class="form-control" required = "required"/>
 </div>
 <div class="form-group">
 <label class="control-label"> ROLE </label>
 <select name="role"  class="form-control"/>
 <option value="user" <?php if ($role=="user") echo "selected"  ?>> User </option>
 <option value="admin" <?php if ($role=="admin") echo "selected"  ?>> Admin </option>


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

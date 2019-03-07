<?php
require_once ("session.php");
require_once ("connexion.php");
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
                <div class="panel-heading"> <h3>AJOUTER UN NOUVEAU DEPOT</h3></div>
                    <div class="panel-body">

                    <form method="post" action="enregistrerdepot.php">
                        <div class="form-group">
                            <label class="control-label"> </label>
                            <input type="hidden" name="iddepot" class="form-control"/>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">MONTANT  </label>
                            <input type="number" name="montantdepot" class="form-control" 
                            required = "required" pattern = "[0-9]+"/>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label"> DATE </label>
                            <input type="date" name="datedepot" class="form-control" required = "required" placeholder="xx-xx-xxxx"/>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label"> NOM ET PRENOMS </label>
                            <select name="id"  class="form-control">

                                <?php while($membres = $ps->fetch()) {?>
                                    <option value="<?php echo ($membres['id']) ?>">
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

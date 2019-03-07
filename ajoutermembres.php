<?php
require_once ("session.php");
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

             <form method="post" action="enregistrermembres.php">
               <div class="form-group">
                 <label class="control-label"> </label>
                 <input type="hidden" name="id" class="form-control"/>
               </div>

               <div class="form-group">
                 <label class="control-label" for="nom"> NOM ET PRENOMS </label>
                 <input type="text" name="nom" class="form-control" id="nom" required = "required" placeholder ="epargne plus"/>
               </div>
              
              <div class="form-group">
                <label class="control-label" for="email"> EMAIL </label>
                <input type="email" name="email" class="form-control" id="email" placeholder ="epargne@epargneplus.com"
                required = "required" pattern = "^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}"/>
              </div>
              
            <div class="form-group">
              <label class="control-label" for="telephone"> TELEPHONE </label>
              <input type="tel" name="telephone" class="form-control" id="telephone" placeholder ="01020304"
               required = "required" pattern = "[0-9]{8}"/>
          </div>
        
          <div class="form-group">
            <label class="control-label" for="login"> LOGIN </label>
            <input type="text" name="login" class="form-control" id="login" required = "required"/>
          </div>
          
          <div class="form-group">
            <label class="control-label" for="password"> MOT DE PASSE </label>
            <input type="password" name="password" class="form-control" id="password" required = "required"/>
          </div>
          

         <div class="form-group">
           <label class="control-label"> ROLE </label>
           <select name="role"  class="form-control">
           <option value="user"> user </option>
           <option value="admin"> admin </option>
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

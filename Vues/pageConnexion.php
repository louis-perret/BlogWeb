<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="blog.css">

    <title>Blog</title>
  </head>
  <body>
    <?php require('header.php'); ?>
    <!-- Contient seulement le formulaire de connexion -->
    <div class="container">
      <form method="post" action="index.php?action=seconnecter"> <!--Faudra spécifier une action pour le contrôleur plus tard-->
        <div>
          <div class="form-group">
            <label>Pseudo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
          </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
      </form>
    </div>
  </body>
</html>
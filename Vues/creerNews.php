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
    <!-- Contient seulement le formulaire de création de la news -->
    <div class="container">
      <form method="post" action="index.php?action=ajouterNews"> 
        <div>
          <div class="form-group">
            <label>Titre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
          </div>
          <div class="mb-3">
            <label>Contenu</label>
            	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="contenu"></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Poster</button>
      </form>
    </div>
  </body>
</html>

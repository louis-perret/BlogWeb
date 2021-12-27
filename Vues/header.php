<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Vues/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="Vues/blog.css">

    <title>Blog</title>
    </head>
    <!-- Notre header (menu)-->
    <body>
      <div class="container-fluid">
        <!-- Menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <img src="Images/PhotoProfil.jpg" width="5%" height="5%"/>

          <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="mr-auto">
              <li class="nav-item dropdown">
                  <a class="dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none; color: black;">
                    Nombre de messages
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <p class="dropdown-item"> Blog : <?=$nbComTotal//Obtenu avec la BD?></p>
                    <p class="dropdown-item"> Personnels : <?=$compteur //Obtenu avec un cookie?></p>
                    <div class="dropdown-divider"></div>
                  </div>
              </li>
            
            </ul>
		
            <?php /* Permet d'afficher un élément html si true dans le if. Servira quand l'admin sera connecté */
              if($estConnecte) : ?>
                
                  <a href="index.php?action=afficherFormNews" class="btn btn-dark" style="margin: 10px;">Ajouter une news</a>
              <?php endif; ?>

            <form class="form-inline my-2 my-lg-0" action="index.php?action=RechercherNews">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_bar">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
            <?php /* Permet d'afficher un élément html si true dans le if. Servira quand l'admin sera connecté */
              if(!$estConnecte) : //Quand il sera déconnecté ?> 
                <a href="index.php?action=connexion" class="btn btn-outline-info" style="margin: 10px;">Se connecter</a>
            <?php else : //Quand il sera connecté ?> 
              <form action="">
                  <a  href="index.php?action=sedeconnecter" class="btn btn-outline-danger" style="margin: 10px;">Se déconnecter</a>
              </form>
            <?php endif; ?>
            <a href="index.php">
              <img style="max-width: 50px;" src="Images/maison.png"/>
            </a>
          </div>
        </nav>
      </div>

      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



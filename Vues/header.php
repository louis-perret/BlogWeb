<div class="container-fluid">
      <!-- Menu -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?k=20&m=1223671392&s=170667a&w=0&h=kEAA35Eaz8k8A3qAGkuY8OZxpfvn9653gDjQwDHZGPE=" width="5%" height="5%">

        <div class="navbar-collapse" id="navbarSupportedContent">
          <ul class="mr-auto">
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none; color: black;">
                  Nombre de messages
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <p class="dropdown-item"> Blog : <?= 20 //A changer plus tard?></p>
                  <p class="dropdown-item"> Personnels : <?= 10 //A changer plus tard?></p>
                  <div class="dropdown-divider"></div>
                </div>
            </li>
            
          </ul>

          <?php /* Permet d'afficher un élément html si true dans le if. Servira quand l'admin sera connecté */
            if($estConnecte) : ?> 
            <button type="button" class="btn btn-dark" style="margin: 10px;">Ajouter une news</button>
          <?php endif; ?>

          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
          </form>
          <?php /* Permet d'afficher un élément html si true dans le if. Servira quand l'admin sera connecté */
            if(!$estConnecte) : //Quand il sera déconnecté ?> 
              <form action="index.php?action=seconnecter"> <!-- Pour qu'un bouton fonctionne il faut le mettre dans un formulaire -->
                <button type="submit" class="btn btn-outline-info" style="margin: 10px;">Se connecter</button>
              </form>
          <?php else : //Quand il sera connecté ?> 
            <button  type="button" class="btn btn-outline-danger" style="margin: 10px;">Se déconnecter</button>
          <?php endif; ?>
          
        </div>
      </nav>
    </div>

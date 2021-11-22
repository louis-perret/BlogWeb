<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Vues/bootstrap/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="Vues/blog.css">

    <title>Blog</title>
  </head>
  <body>
    <?php 
      $estConnecte=false;
      if(isset($compte)){ //Teste si un administrateur est connecté
        $estConnecte=true;
      }
    ?>
    <?php require('Vues/header.php'); ?>
    <div>
      <!--News-->
      <main class="container">
        <?php 
          require_once('Metier/News.php');
          $tabNews=[];
          for($i=0;$i<20;$i++){
            $n=new News(20,date('d-m-Y'),"Titre","Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.","https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Forig00.deviantart.net%2F74ee%2Ff%2F2011%2F218%2F5%2F9%2Fhatsune_miku___po_pi_po_dance_by_teamvocaloid-d45mqil.gif&f=1&nofb=1",[]);
            $tabNews[]=$n;
          }
          foreach($tabNews as $news) : ?>
          <div class="container blocMain">
            <div class="alignement">
              <p class="header"><?=$news->getDate() ?> </p>
              <h3><?=$news->getTitre() ?> </h3>
              <?php if($estConnecte) : ?> 
                <button type="button" class="btn btn-outline-dark" style="margin: 10px;">Effacer</button>
              <?php else : ?>
                <p/> <!-- Permet l'alignement -->
              <?php endif; ?>
            </div>
            <img src="<?=$news->getImage() ?>" class="bloc1" width="20%" />
            <p style="text-align: justify;"><?=$news->getContenu() ?></p>
            <div style="clear: both;"> <!-- Permet de stopper le float --> </div>
            
            <div class="footerNews">
              <a href="" style="padding-top: 30px"> &rarr;Afficher commentaire </a>
              <button type="button" class="btn btn-outline-primary" style="margin: 10px;">Ajouter commentaire</button>
          </div>
          </div>
        <?php endforeach; ?>
      </main>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

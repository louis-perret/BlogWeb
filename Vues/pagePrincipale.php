<?php require('Vues/header.php'); ?>
    <div>
      <!--News-->
      <main class="container">
        <?php 
          if(isset($tabNews)) : ?>
            <?php foreach($tabNews as $news) : ?>
            <div class="container blocMain">
              <div class="alignement">
                <p class="header"><?=$news->getDate() ?> </p>
                <h3><?=$news->getTitre() ?> </h3>
                <?php if($estConnecte) : ?> 
                  <form action="">
                    <button type="submit" class="btn btn-outline-dark" style="margin: 10px;">Effacer</button>
                  </form>
                <?php else : ?>
                  <p/> <!-- Permet l'alignement -->
                <?php endif; ?>
              </div>
              
              <p style="text-align: justify;"><?=$news->getContenu() ?></p>
              <div style="clear: both;"> <!-- Permet de stopper le float --> </div>
              
              <div class="footerNews">
                <form method="post" action="index.php?action=affichCom&id=<?=$news->getId()?>">
                  <button type="submit" class="btn btn-outline-primary" style="margin: 10px;">Ajouter commentaire</button>
                </form>
              </div>
            </div>
            <?php endforeach; ?>
          <?php endif; ?>
      </main>
    </div>

    <?php 
      //$pagePreced=$numPage-1;
      //$pageSuiv=$numPage+1;

      $pagePreced=0;
      $pageSuiv=0;
      $nbPagesMax=0;
    ?>
    <center>
      <div class="container" style="display: inline-flex; justify-content: center;">
        <?php if($pagePreced>0) : //Si on est pas à la première page ?> 
          <a class="lien" href="scriptAfficherParPage.php?page=<?=$pagePreced ?>" style="color: black; margin: 5px;">page <?=$pagePreced?> &larr;</a>
          <p style="color: black; margin: 5px;">...</p>
        <?php endif; ?>
        <?php if($pageSuiv<=$nbPagesMax) : //Si on est pas à la dernière page ?>
          <a class="lien" href="scriptAfficherParPage.php?page=<?=$pageSuiv ?>" style="color: black; margin: 5px;"> &rarr; page <?=$pageSuiv?></a>
        <?php endif; ?>
      <div>
    </center>
  </body>
</html>

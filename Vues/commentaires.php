<!doctype html>
<html lang="en">
	<head>
    		<!-- Required meta tags -->
    		<meta charset="utf-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
		    <!-- Bootstrap CSS -->
    		<link rel="stylesheet" href="Vues/bootstrap/css/bootstrap.css" type="text/css"/>
    		<link rel="stylesheet" href="Vues/blog.css"/>

    		<title>Blog</title>
  	</head>
	<body class="all">
		<div class="wrapper">
		<?php 
      			$estConnecte=false;
      			if(isset($compte)){ //Teste si un administrateur est connecté
        			$estConnecte=true;
      			}
    		?>
		<?php require('header.php'); ?>
		<div class="container-fluid">
				<center>
   				<div class="col  blocMain newsContent">
    					<?php 
						require_once('Metier/News.php');
						$n=new News(20,date('d-m-Y'),"Titre","Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.","https://external-content.duckduckgo.com/iu/?						
						u=https%3A%2F%2Forig00.deviantart.net%2F74ee%2Ff%2F2011%2F218%2F5%2F9%2Fhatsune_miku___po_pi_po_dance_by_teamvocaloid-d45mqil.gif&f=1&nofb=1",[]);
					?>
<!--</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>-->
					<div class="container-fluid">
  						<div class="row" align="center">
							<div class="col">
								<img src="<?=$n->getImage() ?>" class="bloc1" width="20%"/>
							</div>					
    							<div class="col">
      								<h2 class="header"><?=$n->getTitre() ?></h2>
    							</div>
							<div class="col">
    					 			<?=$n->getDate() ?>
    							</div>
  						</div>
						<div class="row">
							<div class="col">
								<?=$n->getContenu() ?>
							</div>
						</div>
					</div>
    				</div>
				</center>
    				<div class="col" id="sectionCom">
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Commenter" aria-label="Commenter">
            					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Poster</button>
					</form>
					<p text-align="center"><h2>Section Commentaire</h2></p>

      					<?php 
          					require_once('Metier/Commentaire.php');
          					$tabCom=[];
         					for($i=0;$i<20;$i++){
            					$n=new Commentaire(date('d-m-Y'),"Lorem ipsum dolor sit amet.");
						$n->setPseudo("user");
            					$tabCom[]=$n;
          					}
          					foreach($tabCom as $com) : ?>
							<div class="displayer">
							<div class="container blocMain">
            							<div class="alignement">
              								<p class="header"><?=$com->getDate() ?> </p>
              								<h3><?=$com->getPseudo() ?> </h3>
            							</div>
            							<p style="text-align: justify;"><?=$com->getContenu() ?></p>
            							<div style="clear: both;"> <!-- Permet de stopper le float --> </div>
          						</div>
							<img src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?k=20&m=1223671392&s=170667a&w=0&h=kEAA35Eaz8k8A3qAGkuY8OZxpfvn9653gDjQwDHZGPE=" width="5%" height="5%">
							</div>
        					<?php endforeach; ?>
    				</div>
		</div>
			<div class="sticky">
				<span>
					<button type="button" ><a href="#sectionCom">aller au commentaires</a></button>
				</span>
			</div>
		</div>
	</body>
</html>

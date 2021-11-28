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
		<?php require('header.php'); ?>
		<?php 
			require_once('Metier/News.php');
			$n=new News(20,date('Y-m-d'),"Titre","Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",[]);
			if(isset($n)) : ?>
		<div class="container-fluid">
				<center>
	   				<div class="col  blocMain newsContent">
							<div class="container-fluid">
		  						<div class="row" align="center">
									<div class="col">
										<p></p>
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
          					$tabCom=[]; //Tableau qui contient tous les commentaires de la news
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
							<img src="Images/PhotoProfil.jpg" width="5%" height="5%">
							</div>
        					<?php endforeach; ?>
    				</div>
		</div>
		
			<div class="sticky">
				<span>
					<button type="button" ><a href="#sectionCom">aller aux commentaires</a></button>
				</span>
			</div>
			<?php endif; ?>
		</div>

	</body>
</html>

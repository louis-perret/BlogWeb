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
					<form class="form-inline my-2 my-lg-0" action="index.php">
						<input class="form-control mr-sm-2" type="search" placeholder="Commenter" aria-label="Commenter" name="com">
						<input class="form-control mr-sm-2" type="search" placeholder="pseudo" aria-label="pseudo" name="pseudo" value="<?=$_SESSION['pseudo']??""?>">
						<input type="hidden" value="<?=$n->getId()?>" name="id">
            					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Poster</button>
					</form>
					<p text-align="center"><h2>Section Commentaire</h2></p>
					
      					<?php if (isset($tabCom)) :
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
        					<?php endforeach; endif;?>
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

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
		<button type="button"><a href="#sectionCom">aller au commentaires</a></button>
		<?php 
      			$estConnecte=false;
      			if(isset($compte)){ //Teste si un administrateur est connecté
        			$estConnecte=true;
      			}
    		?>
		<?php require('header.php'); ?>
		<div class="container-fluid">
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
					<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
					<div class="container-fluid">
  						<div class="row">
    							<div class="col">
    					 			<?=$n->getDate() ?>
    							</div>
    							<div class="col">
      								<h2><?=$n->getTitre() ?></h2>
    							</div>
  						</div>
						<div class="row">
							<div class="col">
								<?=$n->getContenu() ?>
							</div>
						</div>
					</div>
    				</div>
    				<div class="col" id="sectionCom">
      					Column
    				</div>
		</div>
	</body>
</html>

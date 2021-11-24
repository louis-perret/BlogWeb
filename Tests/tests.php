<!-- Page de test -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tests</title>
	</head>
	<body>
		<h1>Tests</h1>
		<?php
			require_once('../Config/Validation.php');
			require_once("../Config/config.php");
			require_once("../Metier/News.php");
			require_once("../DAL/NewsGateway.php");

			$titre="Bientôt Noël";
			$n=new News(20,date('Y-m-d'),$titre,"Après Hallowen, ma fête préférée fait bientôt son grand retour après bientôt un an d'absence !","",[]);

			echo "$n";

			if(true){ //Test de NewsGateway.php
				try{
					$newsGateway=new NewsGateway($c); //Fonctionne

					/*for($i=0;$i<20;$i++){
			            $n=new News(20,date('Y-m-d'),"Titre","Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.","https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Forig00.deviantart.net%2F74ee%2Ff%2F2011%2F218%2F5%2F9%2Fhatsune_miku___po_pi_po_dance_by_teamvocaloid-d45mqil.gif&f=1&nofb=1",[]);
			            $newsGateway->insertNews($n);//Fonctionne  
			        }*/
					/*$titre="Summer holyday";
					$contenu="Dreamcatcher revient en force avec leur nouvel album. Ambiance d'été garantie ! Personnellement ma musique préférée est whistle. Would you stay with me whistle whistle";
					$image="https://www.taiyou.fr/an_content/_upload/img-prod/46247/3_1.jpg";
					$n=new News(20,date('Y-m-d'),$titre,$contenu,$image,[]);*/

					
					/*$tabNews=[];
					$tabNews=$newsGateway->getNewsByTitre('Bientôt Noël'); //Fonctionne

					echo("<h1>News par titre : <br></h1>");
					foreach($tabNews as $n){
						echo($n);
					}

					$tabNews=$newsGateway->getNewsByDate(date('Y-m-d')); //Fonctionne
					echo("<h1>News par date : <br></h1>");
					foreach($tabNews as $n){
						echo($n);
					}

					$tabNews=$newsGateway->getNewsByTitre('Bientôt Noël');
					foreach($tabNews as $news){
						$n=$news;
					}
		            
					//$newsGateway->deleteNews($n);//Fonctionne

					echo("<h1>News par page : <br></h1>");
					$numPage=1;
					$nbNews=10;
					$tabNews=$newsGateway->findByPage($numPage,$nbNews);
					foreach($tabNews as $n){
						echo($n);
					}*/
				}
				catch(PDOException $e){
					$tabErreur[]="Problème dans l'exécution des requêtes";
					require('../Vues/erreur.php');
				}

			}
			
            

		?>
	</body>
</html>

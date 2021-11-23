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

			$titre=filter_var("Bientôt Noël");
			$n=new News(20,date('d-m-y'),$titre,"Après Hallowen, ma fête préférée fait bientôt son grand retour après bientôt un an d'absence !","",[]);

			echo "$n";

			if(true){ //Test de NewsGateway.php
				try{
					$newsGateway=new NewsGateway($c); //Fonctionne
					$newsGateway->insertNews($n);//Fonctionne
					$tabNews=[];
					$tabNews=$newsGateway->getNewsByTitre('coucou'); //Fonctionne

					echo("<h1>News par titre : <br></h1>");
					foreach($tabNews as $n){
						echo($n);
					}

					$tabNews=$newsGateway->getNewsByDate(date('d-m-y')); //Fonctionne
					echo("<h1>News par date : <br></h1>");
					foreach($tabNews as $n){
						echo($n);
					}

					$tabNews=$newsGateway->getNewsByTitre('Bientôt Noël');
					foreach($tabNews as $news){
						$n=$news;
					}
		            
					$newsGateway->deleteNews($n);//Fonctionne
				}
				catch(PDOException $e){
					$tabErreur[]='Problème de connexion à la base de données';
					require('../Vues/erreur.php');
				}

			}
			
            

		?>
	</body>
</html>

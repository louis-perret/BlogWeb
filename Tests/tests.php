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
			require_once('Config/Validation.php');
			require_once("Config/Connexion.php");
			require_once("Modele/News.php");
			require_once("Controleurs/newsGateway.php");

			$n=new News(20,date('d-m-y'),"Bientôt Noël","Après Hallowen, ma fête préférée fait bientôt son grand retour après bientôt un an d'absence !","",[]);

			echo "$n";

			

			$dsn="mysql:host=localhost;dbname=bdblog";
			

			try{
				$c = new Connexion($dsn,"root","");
			}
			catch(PDOException $e){
				 echo('Problème de connenxion à la base de données');
			}

			if(true){ //Test de NewsGateway.php
				$newsGateway=new NewsGateway($c); //Fonctionne
				$tabNews=[];
				$tabNews=$newsGateway->getNewsByTitre('coucou'); //Fonctionne
				foreach($tabNews as $n){
					echo($n);
				}

				$tabNews=$newsGateway->getNewsByDate(date('d-m-y')); //Fonctionne
				foreach($tabNews as $n){
					echo($n);
				}

				$tabNews=$newsGateway->getNewsByTitre('Bientôt Noël');
				foreach($tabNews as $news){
					$n=$news;
				}
	            //$newsGateway->insertNews($n);//Fonctionne
				$newsGateway->deleteNews($n);//Fonctionne

			}
			
            

		?>
	</body>
</html>

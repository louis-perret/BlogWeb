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
		
			require_once("Modele/News.php");

			$n=new News(date('d-m-y'),"Bientôt Noël","Après Hallowen, ma fête préférée fait bientôt son grand retour après bientôt un an d'absence !");

			echo "$n";

			$tabErreur=array(
				"1" => "Mauvais identifiant",
				"2" => "Mauvais login",
			);

			require('Vues/erreur.php');
		?>
	</body>
</html>
